<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Blog_Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use function Laravel\Prompts\alert;
use function Laravel\Prompts\confirm;

class BlogController extends Controller
{


    public function blogsite() {

        $blogs = Blog::orderBy('created_at', 'desc')->get();

        return view('blog.blogsite', compact('blogs'));

    }


    public function create() {

        return view('blog.addblog');

    }




    public function details(Request $request, $slug) {

        // dd($request);

        $id = $request->query('id');
        $blog = Blog::find($id);

        $user = User::find($blog->user_id);
        $username = '#null';
        if($user){
            $username = $user->username;
        }

        // dd($blog);

        return view('blog.details', compact('blog', 'username'));
    }



    public function edit(Request $request, $slug) {

        $id = $request->query('blog_id');
        $blog = Blog::find($id);

        // dd($blog);
        
        return view('blog.edit', compact('blog'));
    }







    public function store(Request $request) {
        

        //dd($request);

        $blog = Blog::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'details' => $request->details,
            'category' => $request->category,
        ]);


        if($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
            
                $blog_image = Blog_Image::create([
                    'blog_id' => $blog->id,
                    'image' => $image->store("images/blog_post/{$blog->id}", 'public'),
                    'size' => $image->getSize(),
                    'mime' => $image->getMimeType(),
                ]);
    
            }
        }

        return redirect()->route('blog')->with('success', 'Your Post have been posted');

    }



    public function update(Request $request, $id) {
        

        try {

            $blog = Blog::find($id);

            // dd($request);
    
            $blog->update([
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'description' => $request->description,
                'details' => $request->details,
                'category' => $request->category,
            ]);
    
    
            if($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                
                    $blog_image = Blog_Image::create([
                        'blog_id' => $blog->id,
                        'image' => $image->store("images/blog_post/{$blog->id}", 'public'),
                        'size' => $image->getSize(),
                        'mime' => $image->getMimeType(),
                    ]);
        
                }
            }

            return redirect()->route('blog')->with('success', 'Your Post have been Updated');

        } 
        
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
 

    }




    public function delete($id) {

        $blog = Blog::find($id);


        try {
            if($blog) {

                $images = $blog->blog_image;

                foreach ($images as $image) {
                    
                    $path = "public/{$image->image}";

                    if (Storage::exists($path)) {
                        Storage::delete($path);
                    }
                    $image->delete();
                }
                
                $blog->blog_image()->delete();
                $blog->delete();
            }
            else{
                return redirect()->route('blog')->with('error', 'Post not found');
            }
    
        }

        catch(\Exception $e) {
            return redirect()->route('blog')->with('error', 'Something went wrong');
        }


        return redirect()->route('blog')->with('success', 'Post has been deleted');

    }


    public function delete_image(Request $request, $blog_id, $imgid) {

        $blog = Blog::find($blog_id);
        $image = Blog_Image::find($imgid);


        if (!$image) {
            return redirect()->back()->with('error', 'Image not found');
        }

        $path = "public/{$image->image}";
        
        if (Storage::exists($path)) {
            Storage::delete($path);
            $image->delete();
    
            return redirect()->back()->with('warning', 'Image has been deleted');
        }
        
        else {
            return redirect()->back()->with('error', 'File not found');
        }

    }
}

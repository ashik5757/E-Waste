<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommunityController extends Controller
{
    
    public function community() {
        $threads = Thread::all();
        return view('community.forum', compact('threads'));
    }



    public function create() {
        return view('community.create');
        
    }


    // public function edit(Request $request, $slug) {

    //     $id = $request->query('blog_id');
    //     $blog = Blog::find($id);

    //     // dd($blog);
        
    //     return view('blog.edit', compact('blog'));
    // }







    public function store(Request $request) {
        

        //dd($request);
        $thread = Thread::create([
            'user_id' => Auth::user()->id,
            'question' => $request->description,
        ]);

        if($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
            
                $thread_image = thread_Image::create([
                    'thread_id' => $thread->id,
                    'image' => $image->store("images/thread_post/{$thread->id}", 'public'),
                    'size' => $image->getSize(),
                    'mime' => $image->getMimeType(),
                ]);
    
            }
        }

        return redirect()->route('blog')->with('success', 'Your Query have been posted');

    }



//     public function update(Request $request, $id) {
        

//         try {

//             $blog = Blog::find($id);

//             // dd($request);
    
//             $blog->update([
//                 'user_id' => Auth::user()->id,
//                 'title' => $request->title,
//                 'description' => $request->description,
//                 'details' => $request->details,
//                 'category' => $request->category,
//             ]);
    
    
//             if($request->hasFile('images')) {
//                 foreach ($request->file('images') as $image) {
                
//                     $blog_image = Blog_Image::create([
//                         'blog_id' => $blog->id,
//                         'image' => $image->store("images/blog_post/{$blog->id}", 'public'),
//                         'size' => $image->getSize(),
//                         'mime' => $image->getMimeType(),
//                     ]);
        
//                 }
//             }

//             return redirect()->route('blog')->with('success', 'Your Post have been Updated');

//         } 
        
//         catch (\Exception $e) {
//             return redirect()->back()->with('error', 'Something went wrong');
//         }




        

//     }


//     public function delete($id) {

//         $blog = Blog::find($id);


//         try {
//             if($blog) {

//                 $images = $blog->blog_image;

//                 foreach ($images as $image) {
                    
//                     $path = "public/{$image->image}";

//                     if (Storage::exists($path)) {
//                         Storage::delete($path);
//                     }
//                     $image->delete();
//                 }
                
//                 $blog->blog_image()->delete();
//                 $blog->delete();
//             }
//             else{
//                 return redirect()->route('blog')->with('error', 'Post not found');
//             }
    
//         }

//         catch(\Exception $e) {
//             return redirect()->route('blog')->with('error', 'Something went wrong');
//         }


//         return redirect()->route('blog')->with('success', 'Post has been deleted');

//     }


//     public function delete_image($blog_id, $imgid) {

//         $blog = Blog::find($blog_id);
//         $image = Blog_Image::find($imgid);


//         if (!$image) {
//             return redirect()->back()->with('error', 'Image not found');
//         }

//         $path = "public/{$image->image}";
        
//         if (Storage::exists($path)) {
//             Storage::delete($path);
//             $image->delete();
    
//             return redirect()->back()->with('warning', 'Image has been deleted');
//         }
        
//         else {
//             return redirect()->back()->with('error', 'File not found');
//         }

//     }
// }





}

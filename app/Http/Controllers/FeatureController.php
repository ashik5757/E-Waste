<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Feature_Video;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FeatureController extends Controller
{
    public function feature() {

        $features = Feature::orderBy('created_at', 'desc')->get();

        return view('feature.feature', compact('features'));
    }


    public function create() {
        return view('feature.addfeature');
    }

    public function store(Request $request) {


        // dd($request);


        $feature = Feature::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'details' => $request->details,
            'category' => $request->category,
            'thumbnail' => 'No_thumbnail_2.jpg',
        ]);

        // dd($feature->id);

        if($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $feature->thumbnail = $image->store("images/feature_post/{$feature->id}", 'public');
                $feature->save();
            }
        }


        if($request->hasFile('videos')) {
            foreach ($request->file('videos') as $video) {
            
                $feature_video = Feature_Video::create([
                    'feature_id' => $feature->id,
                    'video' => $video->store("videos/feature_post/{$feature->id}", 'public'),
                    'size' => $video->getSize(),
                    'mime' => $video->getMimeType(),
                ]);
    
            }
        }

        return redirect()->route('features')->with('success', 'Your Feature have been posted');

    }



    public function details(Request $request, $slug) {

        $id = $request->query('id');
        $feature = Feature::find($id);

        $user = User::find($feature->user_id);
        $username = '#null';
        if($user){
            $username = $user->username;
        }

        return view('feature.details', compact('feature', 'username'));
    }


    public function edit(Request $request, $slug) {

        // dd($request);

        $id = $request->query('feature_id');
        $feature = Feature::find($id);

        // dd($blog);
        
        return view('feature.edit', compact('feature'));
    }


    public function update(Request $request, $id) {
        
        // dd($request);

        try {

            $feature = Feature::find($id);

            // dd($request);
    
            $feature->update([
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'description' => $request->description,
                'details' => $request->details,
                'category' => $request->category,
            ]);
    
    
            if($request->hasFile('image')) {

                $path = "public/{$feature->thumbnail}";
                if (Storage::exists($path)) {
                    Storage::delete($path);
                }
                
                foreach ($request->file('image') as $image) {
                    $feature->thumbnail = $image->store("images/feature_post/{$feature->id}", 'public');
                    $feature->save();
                }
            }


            if($request->hasFile('videos')) {


                foreach ($request->file('videos') as $video) {
                    $feature_video = Feature_Video::create([
                        'feature_id' => $feature->id,
                        'video' => $video->store("videos/feature_post/{$feature->id}", 'public'),
                        'size' => $video->getSize(),
                        'mime' => $video->getMimeType(),
                    ]);
                }
            }

            return redirect()->route('features')->with('success', 'Your Post have been Updated');

        } 
        
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
 

    }


    public function delete_video($feature_id, $videoid) {

        // dd($videoid);

        $feature = Feature::find($feature_id);
        $video = Feature_Video::find($videoid);


        if (!$video) {
            return redirect()->back()->with('error', 'Video not found');
        }

        $path = "public/{$video->video}";
        
        if (Storage::exists($path)) {
            Storage::delete($path);
            $video->delete();
    
            return redirect()->back()->with('warning', 'Video has been deleted');
        }
        
        else {
            return redirect()->back()->with('error', 'File not found');
        }





    }


    
    public function delete_thumbnail(Request $request, $feature_id) {

        $feature = Feature::find($feature_id);

        // dd($feature);


        $path = "public/{$feature->thumbnail}";

        if (!$path) {
            return redirect()->back()->with('error', 'Image not found');
        }

        
        if (Storage::exists($path)) {
            Storage::delete($path);
            $feature->thumbnail = 'No_thumbnail_2.jpg';
            $feature->save();
    
            return redirect()->back()->with('warning', 'Image has been deleted');
        }
        
        else {
            return redirect()->back()->with('error', 'File not found');
        }

    }







    
    public function delete($id) {

        // dd($id);

        $feature = Feature::find($id);


        try {
            if($feature) {

                $videos = $feature->feature_videos;

                foreach ($videos as $video) {
                    
                    $path = "public/{$video->video}";

                    if (Storage::exists($path)) {
                        Storage::delete($path);
                    }
                    $video->delete();
                }


                $path = "public/{$feature->thumbnail}";

                if (Storage::exists($path)) {
                    Storage::delete($path);
                }

                
                $feature->feature_videos()->delete();
                $feature->delete();
            }
            else{
                return redirect()->route('features')->with('error', 'Feature Post not found');
            }
    
        }

        catch(\Exception $e) {
            return redirect()->route('features')->with('error', 'Something went wrong');
        }


        return redirect()->route('features')->with('success', 'Feature Post has been deleted');

    }




}

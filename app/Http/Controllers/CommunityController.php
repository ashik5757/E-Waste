<?php

namespace App\Http\Controllers;
use App\Models\Thread;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class CommunityController extends Controller
{
    public function index()
    {
        $threads = Thread::orderBy('created_at', 'desc')->get();
        return view('community.forum', compact('threads'));
    }

    public function create()
    {
        return view('community.create');
    }

    public function details(Request $request) {

        $id = $request->query('id');
        $thread = Thread::find($id);

        if ($thread) {
            $user = User::find($thread->user_id);
            $username = $user ? $user->username : '#null';
            return view('community.details', compact('thread', 'username'));
        }
        else {
            return redirect()->back();
        }

    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
        ]);

        $thread = Thread::create([
            'user_id' => Auth::id(),
            'question' => $request->question,           
        ]);
        return redirect()->route('community.index')->with('success', 'Your Post have been posted');
    }

    public function addAnswer(Thread $thread, Request $request)
    {
        $request->validate([
            'answer' => 'required',
        ]);

        $answer = new Comment([
            'user_id' => Auth::id(),
            'answer' => $request->input('answer'),
            
        ]);

        $thread->answers()->save($answer);

        return redirect()->route('thread.details', $thread);
    }




    public function edit(Request $request, $thread_id) {

        // dd($request);
    
        // $id = $request->query('thread_id');
        $thread = Thread::find($thread_id);
    
        // dd($blog);
        
        return view('community.edit', compact('thread'));
    }
    
    
    
    public function update(Request $request, $id) {
            
        // dd($request);
    
        try {
    
            $thread = Thread::find($id);
    
            // dd($request);
    
            $thread->update([
                'user_id' => Auth::user()->id,
                'question' => $request->question,
            ]);
    

            return redirect()->route('community.index')->with('success', 'Your Question have been Updated');
    
        } 
        
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    
    }
    
    







        
    public function delete($id) {

        // dd($id);

        $thread = Thread::find($id);


        try {
            if($thread) {

                $answers = $thread->answers;

                foreach ($answers as $answer) {
                    $answer->delete();
                }
                
                $thread->answers()->delete();
                $thread->delete();
            }
            else{
                return redirect()->route('community.index')->with('error', 'Feature Post not found');
            }
    
        }

        catch(\Exception $e) {
            return redirect()->route('community.index')->with('error', 'Something went wrong');
        }


        return redirect()->route('community.index')->with('success', 'Thread has been deleted');

    }
        
    
    


}


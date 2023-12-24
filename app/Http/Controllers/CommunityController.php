<?php

namespace App\Http\Controllers;
use App\Models\Thread;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;


class CommunityController extends Controller
{
    public function index()
    {
        $threads = Thread::all();
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
}
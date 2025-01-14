<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    /**
     * Toon een lijst van alle topics.
     */
    public function index()
    {
        $topics = Topic::with('user')->latest()->paginate(10); 
        return view('forum.index', compact('topics'));
    }

   
    public function show(Topic $topic)
    {
        $replies = $topic->replies()->with('user')->latest()->paginate(10); 
        return view('forum.show', compact('topic', 'replies'));
    }

   
    public function create()
    {
        return view('forum.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Topic::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('forum.index')->with('success', 'Topic succesvol aangemaakt.');
    }

    
    public function reply(Request $request, Topic $topic)
    {
        $request->validate([
            'content' => 'required|string|max:500', 
        ]);

        Reply::create([
            'content' => $request->content,
            'user_id' => Auth::id(),
            'topic_id' => $topic->id,
        ]);

        return redirect()->route('forum.show', $topic)->with('success', 'Reactie succesvol toegevoegd.');
    }

    
    public function destroy(Topic $topic)
    {
        if (Auth::id() !== $topic->user_id && !Auth::user()->is_admin) {
            return redirect()->route('forum.index')->with('error', 'Je hebt geen toestemming om dit topic te verwijderen.');
        }

        $topic->delete();

        return redirect()->route('forum.index')->with('success', 'Topic succesvol verwijderd.');
    }

    
    public function destroyReply(Reply $reply)
    {
        if (Auth::id() !== $reply->user_id && !Auth::user()->is_admin) {
            return back()->with('error', 'Je hebt geen toestemming om deze reactie te verwijderen.');
        }

        $reply->delete();

        return back()->with('success', 'Reactie succesvol verwijderd.');
    }
}

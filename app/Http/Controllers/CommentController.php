<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, News $news)
    {
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        $news->comments()->create([
            'content' => $request->input('content'),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('news.show', $news)->with('success', 'Reactie geplaatst.');
    }
}

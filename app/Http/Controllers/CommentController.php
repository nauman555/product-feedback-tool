<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Feedback;

class CommentController extends Controller
{
    public function store(Request $request, $feedbackId)
    {
        // $request->validate([
        //     'content' => 'required',
        // ]);

        // Comment::create([
        //     'user_id' => auth()->id(),
        //     'feedback_id' => $feedbackId,
        //     'content' => $request->input('content'),
        // ]);

        // return redirect()->route('feedback.index')->with('success', 'Comment added successfully!');

        $feedback = Feedback::findOrFail($feedbackId);

        if ($feedback->comments_enabled) {
            $request->validate([
            'content' => 'required',
        ]);
            // Allow users to add comments
            Comment::create([
                'user_id' => auth()->id(),
                'feedback_id' => $feedback->id,
                'content' => $request->input('content'),
            ]);

            return redirect()->route('feedback.index', ['id' => $feedbackId])->with('success', 'Comment added successfully.');
        } else {
            return redirect()->route('feedback.index', ['id' => $feedbackId])->with('error', 'Comments are disabled for this feedback.');
        }
    }


}

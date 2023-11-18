<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Feedback;
use App\Models\Comment;

class AdminController extends Controller

{
    public function __construct()
    {
        // $this->middleware('admin'); 
        $this->middleware('auth');
        $this->middleware('admin'); // Apply the admin middleware
    }
    public function index()
    {
        $users = User::all();
        $feedbackItems = Feedback::all();
        return view('admin.index', compact('users', 'feedbackItems'));
    }

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        if ($user->is_admin) {
            return redirect()->route('admin.index')->with('error', 'Cannot delete an admin user.');
        }
        $user->delete();
        return redirect()->route('admin.index')->with('success', 'User deleted successfully!');
    }

    public function destroyFeedback($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();
        return redirect()->route('admin.index')->with('success', 'Feedback item deleted successfully!');
    }

    public function toggleCommentStatus($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->update(['is_enabled' => !$comment->is_enabled]);
        return redirect()->route('admin.index')->with('success', 'Comment status updated successfully!');
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function enableFeedbackComments($id)
    {
        Feedback::findOrFail($id)->update(['comments_enabled' => true]);

        return redirect()->route('admin.index')->with('success', 'Comments on feedback enabled successfully.');
    }

    public function disableFeedbackComments($id)
    {
        Feedback::findOrFail($id)->update(['comments_enabled' => false]);

        return redirect()->route('admin.index')->with('success', 'Comments on feedback disabled successfully.');
    }

    
}

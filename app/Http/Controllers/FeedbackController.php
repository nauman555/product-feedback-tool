<?php
// app/Http/Controllers/FeedbackController.php
namespace app\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Comment;
use App\Models\Vote;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbackItems = Feedback::withCount('comments')->paginate(10);
        return view('feedback.index', compact('feedbackItems'));
    }

    public function create()
    {  $categories = ['Bug Report', 'Feature Request', 'Improvement', 'Other'];

        return view('feedback.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);

        Feedback::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('feedback.index')->with('success', 'Feedback submitted successfully!');
    }

    public function vote(Request $request, $id)
    {
        $feedback = Feedback::findOrFail($id);

        // Check if the user has already voted
        if (!$feedback->votes()->where('user_id', auth()->id())->exists()) {
            // Add a vote
            $vote = new Vote(['user_id' => auth()->id()]);
            $feedback->votes()->save($vote);

            // Increment the vote_count
            $feedback->increment('vote_count');

            return redirect()->route('feedback.index', ['id' => $id])->with('success', 'Vote added successfully.');
        } else {
            return redirect()->route('feedback.index', ['id' => $id])->with('error', 'You have already voted for this feedback.');
        }
    }


   
}
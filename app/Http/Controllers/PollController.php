<?php

use App\Models\Poll;
use App\Models\UserPoll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PollController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'optionOne' => 'required',
            'optionTwo' => 'required',
            'optionThree' => 'nullable',
            'optionFour' => 'nullable',
            'optionFive' => 'nullable',
            'theme_id' => 'required|exists:themes,themeId'
        ]);

        $poll = Poll::create([
            'author' => Auth::user()->username,
            'title' => $validatedData['title'],
            'optionOne' => $validatedData['optionOne'],
            'optionTwo' => $validatedData['optionTwo'],
            'optionThree' => $validatedData['optionThree'],
            'optionFour' => $validatedData['optionFour'],
            'optionFive' => $validatedData['optionFive'],
            'theme_id' => $validatedData['theme_id']
        ]);

        return redirect()->back()->with('success', 'Poll created successfully!');
    }

    public function vote(Request $request, $pollId)
    {
        $poll = Poll::findOrFail($pollId);
        $option = $request->input('option');
        $user = Auth::user();

        // Check if user already voted on this poll
        $existingVote = UserPoll::where('user_id', $user->id)
                                ->where('poll_id', $pollId)
                                ->exists();

        if (!$existingVote) {
            // Create user poll record
            UserPoll::create([
                'user_id' => $user->id,
                'poll_id' => $pollId,
            ]);

            // Update poll option count based on user's choice
            // Example logic similar to your existing vote method
        }

        return response()->json(['success' => true]);
    }

    public function unvote(Request $request, $pollId)
    {
        $user = Auth::user();

        // Delete user poll record for unvoting
        UserPoll::where('user_id', $user->id)
                ->where('poll_id', $pollId)
                ->delete();

        // Update poll option count based on user's unvote choice
        // Example logic similar to your existing unvote method

        return response()->json(['success' => true]);
    }

    public function showPoll($pollId)
    {
        $poll = Poll::findOrFail($pollId);
        
        // Determine if the user has already voted on this poll
        $userHasVoted = UserPoll::where('user_id', Auth::id())
                                ->where('poll_id', $pollId)
                                ->exists();

        return view('pollPost', [
            'pollId' => $pollId,
            'title' => $poll->title,
            'author' => $poll->author,
            'optionOne' => $poll->optionOne,
            'numOne' => $poll->numOne,
            'optionTwo' => $poll->optionTwo,
            'numTwo' => $poll->numTwo,
            'optionThree' => $poll->optionThree,
            'numThree' => $poll->numThree,
            'optionFour' => $poll->optionFour,
            'numFour' => $poll->numFour,
            'optionFive' => $poll->optionFive,
            'numFive' => $poll->numFive,
            'pollVoted' => $userHasVoted, // Pass the variable indicating whether the user has voted
        ]);
    }
}

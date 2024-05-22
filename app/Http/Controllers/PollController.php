<?php

namespace App\Http\Controllers;

use App\Models\Poll;
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

        Poll::create([
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

    if ($option == 'optionOne') {
        $poll->numOne += 1;
    } elseif ($option == 'optionTwo') {
        $poll->numTwo += 1;
    } elseif ($option == 'optionThree') {
        $poll->numThree += 1;
    } elseif ($option == 'optionFour') {
        $poll->numFour += 1;
    } elseif ($option == 'optionFive') {
        $poll->numFive += 1;
    }

    $poll->save();

    return redirect()->back()->with('success', 'Vote submitted successfully!');
}
}

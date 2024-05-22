@extends('layouts.app')

@section('title', $theme->name . ' Polls')

@section('content')
<div class="page-title">
    <h1>{{ $theme->name }} Polls</h1>
</div>

@auth
    @include('components.theme_navbar', ['theme' => $theme])

    

    
<div class="posts-container">
@if (Auth::user()->isAdmin() || Auth::user()->isModerator())
        @include('components.createPollPost', ['theme' => $theme])
    @endif
    <h2>Active Polls</h2>
    @if($theme->polls && $theme->polls->count() > 0)
        @foreach ($theme->polls as $poll)
            <x-pollPost :pollId="$poll->pollId" :title="$poll->title" :author="$poll->author" :optionOne="$poll->optionOne" :optionTwo="$poll->optionTwo" :optionThree="$poll->optionThree" :optionFour="$poll->optionFour" :optionFive="$poll->optionFive">
                <!-- Display poll options and results here -->
            </x-pollPost>
        @endforeach
    @else
        <p>No polls available for this theme.</p>
    @endif
</div>
@endauth

@guest
    <x-text_card>
        To be able to see the full features available, you will need to <a href="{{ route('login') }}" class="auth-link">log in</a> or <a href="{{ route('register') }}" class="auth-link">register</a>.
    </x-text_card>
@endguest



@endsection
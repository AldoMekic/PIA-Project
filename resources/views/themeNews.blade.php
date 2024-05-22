@extends('layouts.app')

@section('title', $theme->name . ' News')

@section('content')
<div class="page-title">
    <h1>{{ $theme->name }} News</h1>
</div>

@auth
    @include('components.theme_navbar', ['theme' => $theme])

    

    <div class="posts-container">
    @if (Auth::user()->isAdmin() || Auth::user()->isModerator())
        @include('components.createNewsPost', ['theme' => $theme])
    @endif
    <h2>Latest News</h2>
    @if($theme->news && $theme->news->count() > 0)
        @foreach ($theme->news as $news)
            <x-newsPost :newsId="$news->newsId" :title="$news->title" :author="$news->author">
                {{ $news->content }}
            </x-newsPost>
        @endforeach
    @else
        <p>No news available for this theme.</p>
    @endif
</div>
@endauth

@guest
    <x-text_card>
        To be able to see the full features available, you will need to <a href="{{ route('login') }}" class="auth-link">log in</a> or <a href="{{ route('register') }}" class="auth-link">register</a>.
    </x-text_card>
@endguest


@endsection
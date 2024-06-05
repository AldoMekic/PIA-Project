@extends('layouts.app')

@section('title', $theme->name . ' Page')

@section('content')
<div class="page-title">
    <h1>{{ $theme->name }} Page</h1>
</div>

@auth
    @include('components.theme_navbar', ['theme' => $theme])
@endauth

@guest
    <x-text_card>
        To be able to see the full features available, you will need to <a href="{{ route('login') }}" class="auth-link">log in</a> or <a href="{{ route('register') }}" class="auth-link">register</a>.
    </x-text_card>
@endguest

<div class="theme-description">
    <x-text_card>
        {{ $theme->description }}
    </x-text_card>
</div>

<div class="posts-container">
    @foreach ($theme->posts as $post)
        <x-post :postID="$post->postID" :title="$post->title" :author="$post->author">
            {{ $post->content }}
        </x-post>
    @endforeach
</div>
@endsection
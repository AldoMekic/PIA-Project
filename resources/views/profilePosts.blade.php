@extends('layouts.app')

@section('title', 'Profile Posts')

@section('content')
<h1>Profile</h1>

@auth
    <div class="profile-info">
        <h2>{{ Auth::user()->username }}</h2>
        <p>User joined on: {{ Auth::user()->created_at->format('m/d/Y') }}</p>
    </div>
    @include('components.navbar')

    <!-- User Posts -->
    <div class="posts-container">
        @include('components.createPost')
        @foreach ($posts as $post)
            <x-post :title="$post->title" :author="$post->author" :postID="$post->postID">
                {{ $post->content }}
            </x-post>
        @endforeach
    </div>
@else
    <p>No user data available.</p>
@endif
@endsection
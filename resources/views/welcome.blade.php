@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <h1>Hello {{ Session::get('user')['username'] ?? 'Guest' }}, welcome to: Welcome</h1> <!-- Dynamically display username or 'Guest' -->
    <?php
        $postController = new \App\Http\Controllers\PostController();
        $post = $postController->index();
    ?>
    <div class="welcome-container">
        @include('components.createPost')
        <x-post :title="$post->title" :author="$post->author">
            {{ $post->content }}
        </x-post>
    </div>
@endsection
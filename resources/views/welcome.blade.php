@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <h1>Hello Laravel</h1>

    <?php
        $post = new \App\Models\Post();  // Instantiate the Post model
        $post->title = "Naziv";
        $post->author = "Autor";
        $post->content = "Sadrzaj";
    ?>
    <div class="welcome-container">
        <x-post :title="$post->title" :author="$post->author">
            {{ $post->content }}
        </x-post>
    </div>
@endsection
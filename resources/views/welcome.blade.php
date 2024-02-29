@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <h1>Hello Laravel</h1>

    <div class="welcome-container">
        <x-post :title="$post->title" :author="$post->author">
            {{ $post->content }}
        </x-post>
    </div>
@endsection
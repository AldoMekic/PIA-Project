@extends('layouts.app')

@section('title', 'Theme Polls')

@section('content')
<div class="page-title">
    <h1>Theme Polls</h1>
</div>

@include('components.theme_navbar')

@guest
    <x-text_card>
        To be able to see the full features available, you will need to <a href="{{ route('login') }}" class="auth-link">log in</a> or <a href="{{ route('register') }}" class="auth-link">register</a>.
    </x-text_card>
@endguest

<div class="posts-container">
    <h2>Active Polls</h2>
    <!-- Polls content will go here -->
</div>
@endsection
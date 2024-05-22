@extends('layouts.app')

@section('title', 'Theme Settings')

@section('content')
<div class="page-title">
    <h1>{{ $theme->name }} Settings</h1>
</div>

@auth
    @include('components.theme_navbar', ['theme' => $theme])
@endauth

@guest
    <x-text_card>
        To be able to see the full features available, you will need to <a href="{{ route('login') }}" class="auth-link">log in</a> or <a href="{{ route('register') }}" class="auth-link">register</a>.
    </x-text_card>
@endguest

<div class="posts-container">
    <h2>Settings Area</h2>
    <!-- Settings content will go here -->
</div>
@endsection
@extends('layouts.app')

@section('title', 'Followed Themes')

@section('content')
<h1>Followed Themes</h1>

@auth
    <div class="profile-info">
        <h2>{{ Auth::user()->username }}</h2>
        <p>User joined on: {{ Auth::user()->created_at->format('m/d/Y') }}</p>
    </div>
    @include('components.navbar')

    <div class="themes-container">
        @foreach ($followedThemes as $theme)
            <x-theme_post :title="$theme->name" :description="$theme->description" :themeId="$theme->themeId" />
        @endforeach
    </div>
@else
    <p>No user data available.</p>
@endif
@endsection
@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<h1>Profile</h1>

@auth
    <div class="profile-info">
        <h2>{{ Auth::user()->username }}</h2>
        <p>User joined on: {{ Auth::user()->created_at->format('m/d/Y') }}</p>
    </div>
    @include('profileInfo') 
@else
    <p>No user data available.</p>
@endif

<div class="profile-buttons">
    <a href="{{ route('profile.info') }}" class="btn btn-link">Profile Info</a>
    <a href="{{ route('profile.posts') }}" class="btn btn-link">Posts</a>
    <a href="{{ route('profile.saved') }}" class="btn btn-link">Saved</a>
    <a href="{{ route('profile.works') }}" class="btn btn-link">Works</a>
</div>
@endsection
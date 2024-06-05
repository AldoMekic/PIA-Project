@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<h1>Profile</h1>

@auth
    <div class="profile-info">
        <h2>{{ Auth::user()->username }}</h2>
        <p>User joined on: {{ Auth::user()->created_at->format('m/d/Y') }}</p>
    </div>
    @include('components.navbar')
    @include('profileInfo') 
@else
    <p>No user data available.</p>
@endif
@endsection
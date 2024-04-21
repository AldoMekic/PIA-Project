@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <h1>Profile</h1>
    
    <div class="profile-info">
        @if (Session::has('user')) <!-- Check if session data exists -->
            <?php
                $userData = Session::get('user');
            ?>
            <h2>{{ $userData['username'] }}</h2>
            <p>User joined on: {{ $userData['joined_date']->format('m/d/Y') }}</p> <!-- Format the date -->
        @else
            <p>No user data available.</p>
        @endif
    </div>

    <div class="profile-buttons">
        <button>Profile Info</button>
        <button>Posts</button>
        <button>Saved</button>
        <button>Works</button>
    </div>

    <div class="profile-blank"></div>
@endsection
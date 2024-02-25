@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <h1>Profile</h1>
    
    <div class="profile-info">
        <?php
            $username = "Username";
            $joinedDate = "1/1/2024";
        ?>
        <h2>{{ $username }}</h2>
        <p>User joined on: {{ $joinedDate }}</p>
    </div>

    <div class="profile-buttons">
        <button>Profile Info</button>
        <button>Posts</button>
        <button>Saved</button>
        <button>Works</button>
    </div>

    <div class="profile-blank"></div>
@endsection
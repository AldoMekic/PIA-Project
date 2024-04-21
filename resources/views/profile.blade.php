@extends('layouts.app')

@section('title', 'Profile')

@php
    use Carbon\Carbon;
@endphp

@section('content')
    <h1>Profile</h1>
    
    @php
        if (Session::has('user')) {
            $userData = Session::get('user');
            $joinedDate = Carbon::parse($userData['joined_date']); 
        }
    @endphp

    <div class="profile-info">
        @if (Session::has('user'))
            <h2>{{ $userData['username'] }}</h2>
            <p>User joined on: {{ $joinedDate->format('m/d/Y') }}</p>
        @else
            <p>No user data available.</p>
        @endif
    </div>

    <div class="profile-buttons">
        <button onclick="showProfileInfo()">Profile Info</button>
        <button onclick="showProfilePosts()">Posts</button>
        <button onclick="showProfileSaved()">Saved</button>
        <button onclick="showProfileWorks()">Works</button>
    </div>

    <div class="profile-blank" id="profileBlank"> <!-- Add ID for JavaScript targeting -->
        @include('components.profile_info') <!-- Default content -->
    </div>
@endsection

@section('scripts') <!-- Include the JavaScript section -->
<script>
function showProfileInfo() {
    fetch('/profile/info')
        .then(response => response.text())
        .then(html => {
            document.getElementById('profileBlank').innerHTML = html;
        });
}

function showProfilePosts() {
    fetch('/profile/posts')
        .then(response => response.text())
        .then(html => {
            document.getElementById('profileBlank').innerHTML = html;
        });
}

function showProfileSaved() {
    fetch('/profile/saved')
        .then(response => response.text())
        .then(html => {
            document.getElementById('profileBlank').innerHTML = html;
        });
}

function showProfileWorks() {
    fetch('/profile/works')
        .then(response => response.text())
        .then(html => {
            document.getElementById('profileBlank').innerHTML = html;
        });
}
</script>
@endsection
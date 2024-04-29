@extends('layouts.app')

@section('title', 'Profile')

@php
    use Carbon\Carbon;
@endphp

@section('content')
<h1>Profile</h1>
    
    @auth
        <div class="profile-info">
            <h2>{{ Auth::user()->username }}</h2>
            <p>User joined on: {{ Auth::user()->created_at->format('m/d/Y') }}</p>
        </div>
    @else
        <p>No user data available.</p>
    @endauth

    <div class="profile-buttons">
        <button onclick="showProfileInfo()">Profile Info</button>
        <button onclick="showProfilePosts()">Posts</button>
        <button onclick="showProfileSaved()">Saved</button>
        <button onclick="showProfileWorks()">Works</button>
    </div>

    <div class="profile-blank" id="profileBlank"> 
        @include('components.profile_info') 
    </div>
@endsection

@section('scripts') 
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
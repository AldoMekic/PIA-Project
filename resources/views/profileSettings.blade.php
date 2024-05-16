@extends('layouts.app')

@section('title', 'User Settings')

@section('content')
<h1>User Settings</h1>

@auth
    <div class="profile-info">
        <h2>{{ Auth::user()->username }}</h2>
        <p>User joined on: {{ Auth::user()->created_at->format('m/d/Y') }}</p>
    </div>
    @include('components.navbar')
    @include('components.user_settings') 
@else
    <p>No user data available.</p>
@endif
@endsection
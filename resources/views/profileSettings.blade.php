@extends('layouts.app')

@section('title', 'User Settings')

@section('content')
<h1>Profile</h1>

@auth
    <div class="profile-info">
        <h2>{{ Auth::user()->username }}</h2>
        <p>User joined on: {{ Auth::user()->created_at->format('m/d/Y') }}</p>
    </div>
    @include('components.navbar')
    @include('components.user_settings') <!-- User settings component -->
    @include('components.delete_account') <!-- Delete account component -->
@else
    <p>No user data available.</p>
@endif
@endsection
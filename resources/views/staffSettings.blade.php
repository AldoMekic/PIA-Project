@extends('layouts.app')

@section('title', 'Staff Settings')

@section('content')
<h1>Staff Settings</h1>

@auth
    <p>Welcome to the Staff Settings page.</p>
    <!-- Add your staff settings content here -->
@else
    <p>No user data available.</p>
@endif
@endsection
@extends('layouts.app')

@section('title', 'Notifications Page')

@section('content')
    <h1>Notifications Page</h1>
    <div class="notifications-container">
        <x-notification type="System Update" from="System Admin" content="A new update is available. Please update your system."></x-notification>
        <x-notification type="New Message" from="John Doe" content="Hello, can you contact me back?"></x-notification>
        <x-notification type="Welcome" from="System" content="Welcome to our forum!"></x-notification>
    </div>
@endsection
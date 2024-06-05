@extends('layouts.app')

@section('title', 'Notifications')

@section('content')
<h1>Notifications</h1>

@auth
    @foreach ($notifications as $notification)
        @include('components.notification', ['type' => $notification->type, 'from' => $notification->from, 'content' => $notification->content])
    @endforeach
@else
    <p>No notifications available.</p>
@endif
@endsection
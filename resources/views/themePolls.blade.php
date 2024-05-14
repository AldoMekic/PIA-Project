@extends('layouts.app')

@section('title', 'Theme Polls')

@section('content')
<div class="page-title">
    <h1>Theme Polls</h1>
</div>

@include('components.theme_navbar')

<div class="posts-container">
    <h2>Active Polls</h2>
    <!-- Polls content will go here -->
</div>
@endsection
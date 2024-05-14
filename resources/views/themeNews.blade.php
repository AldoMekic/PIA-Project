@extends('layouts.app')

@section('title', 'Theme News')

@section('content')
<div class="page-title">
    <h1>Theme News</h1>
</div>

@include('components.theme_navbar')

<div class="posts-container">
    <h2>Latest News</h2>
    <!-- News content will go here -->
</div>
@endsection
@extends('layouts.app')

@section('title', 'Theme Page')

@section('content')
<div class="page-title">
    <h1>Theme Page</h1>
</div>

@include('components.theme_navbar')

<div class="posts-container">
    <x-post title="Example Following Post 1" author="John Doe">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in magna eget nisi varius sodales. Nulla facilisi. Curabitur sit amet ullamcorper turpis. In hac habitasse platea dictumst.
    </x-post>

    <x-post title="Example Following Post 2" author="Jane Doe">
        Fusce efficitur magna in ante cursus blandit. Nulla facilisi. Ut at nisl et neque semper suscipit. Integer vehicula ante eu nulla volutpat tincidunt.
    </x-post>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <h1>Hello Laravel</h1>

    <div class="post-container">
        <x-post title="Example Post 1" author="Jane Smith">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in magna eget nisi varius
            sodales. Nulla facilisi. Curabitur sit amet ullamcorper turpis. In hac habitasse platea
            dictumst.
        </x-post>

        <x-post title="Example Post 2" author="Alice Johnson">
            Fusce efficitur magna in ante cursus blandit. Nulla facilisi. Ut at nisl et neque semper
            suscipit. Integer vehicula ante eu nulla volutpat tincidunt.
        </x-post>
    </div>
@endsection
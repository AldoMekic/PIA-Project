@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <h1>Hello Laravel</h1>

    <div class="welcome-container">

            <x-post :title="Title" :author="Aldin">
                Jedan dva tri
            </x-post>
    </div>
@endsection
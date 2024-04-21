@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="login-container">
        <h1>Login</h1>
        <form action="{{ route('user.login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
@endsection
@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="register-container">
    <h1>Register</h1>
    <form action="{{ route('user.register') }}" method="POST" id="register-form">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @if ($errors->has('name'))
                <span class="error-message">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="surname">Surname:</label>
            <input type="text" id="surname" name="surname" value="{{ old('surname') }}" required>
            @if ($errors->has('surname'))
                <span class="error-message">{{ $errors->first('surname') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            @if ($errors->has('password'))
                <span class="error-message">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="error-message">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Male</option>
                <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Female</option>
            </select>
            @if ($errors->has('gender'))
                <span class="error-message">{{ $errors->first('gender') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="birthplace">Birthplace:</label>
            <input type="text" id="birthplace" name="birthplace" value="{{ old('birthplace') }}" required>
            @if ($errors->has('birthplace'))
                <span class="error-message">{{ $errors->first('birthplace') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
            @if ($errors->has('date_of_birth'))
                <span class="error-message">{{ $errors->first('date_of_birth') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="jmbg">JMBG:</label>
            <input type="text" id="jmbg" name="jmbg" value="{{ old('jmbg') }}" required>
            @if ($errors->has('jmbg'))
                <span class="error-message">{{ $errors->first('jmbg') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="phone_num">Phone Number:</label>
            <input type="text" id="phone_num" name="phone_num" value="{{ old('phone_num') }}" required>
            @if ($errors->has('phone_num'))
                <span class="error-message">{{ $errors->first('phone_num') }}</span>
            @endif
        </div>
        <button type="submit">Register</button>
    </form>
</div>
@endsection

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
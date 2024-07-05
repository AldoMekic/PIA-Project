@extends('layouts.app')

@section('title', $theme->name . ' Settings')

@section('content')
    <div class="page-title">
        <h1>{{ $theme->name }} Settings</h1>
    </div>

    @auth
        @include('components.theme_navbar', ['theme' => $theme])
    @endauth

    <div class="theme-users-container">
        <h2>Users Following {{ $theme->name }}</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($theme->users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>
                            <form action="{{ route('theme.removeFollow', ['themeId' => $theme->themeId, 'userId' => $user->userId]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remove Follow</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
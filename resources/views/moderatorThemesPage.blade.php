@extends('layouts.app')

@section('title', 'Moderator Themes')

@section('content')
    <div class="moderator-themes-container">
        <h1>Moderator Themes</h1>

        <div class="create-theme">
            <h2>Create New Theme</h2>
            <form action="{{ route('theme.create') }}" method="POST" class="theme-form">
                @csrf
                <label for="name">Theme Name:</label>
                <input type="text" id="name" name="name" required class="theme-input">

                <label for="description">Description:</label>
                <textarea id="description" name="description" class="theme-textarea"></textarea>

                <button type="submit" class="theme-button">Create</button>
            </form>
        </div>

        <div class="theme-list">
            <h2>Managed Themes</h2>
            <table>
                <thead>
                    <tr>
                        <th>Theme Name</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($themes as $theme)
                        <tr>
                            <td>{{ $theme->name }}</td>
                            <td>
                                <form action="{{ route('theme.delete', ['themeId' => $theme->themeId]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete Theme</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">No themes available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('title', 'Admin Page')

@section('content')
    <div class="admin-page-container">
        <h1>Admin Page</h1>

        <div class="admin-table">
            <h2>Users</h2>
            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <form action="{{ route('admin.turnModerator', ['userId' => $user->userId]) }}" method="POST">
                                    @csrf
                                    <button type="submit">Turn into Moderator</button>
                                </form>
                                <form action="{{ route('admin.turnAdministrator', ['userId' => $user->userId]) }}" method="POST">
                                    @csrf
                                    <button type="submit">Turn into Administrator</button>
                                </form>
                                <form action="{{ route('admin.deleteAccount', ['userId' => $user->userId]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete Account</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="admin-table">
            <h2>Moderators</h2>
            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($moderators as $moderator)
                        <tr>
                            <td>{{ $moderator->user->username }}</td>
                            <td>{{ $moderator->user->email }}</td>
                            <td>
                                <form action="{{ route('admin.demoteUser', ['userId' => $moderator->user_id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Demote to User</button>
                                </form>
                                <form action="{{ route('admin.promoteAdministrator', ['userId' => $moderator->user_id]) }}" method="POST">
                                    @csrf
                                    <button type="submit">Promote into Administrator</button>
                                </form>
                                <form action="{{ route('admin.deleteAccount', ['userId' => $moderator->user_id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete Account</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="admin-table">
            <h2>Administrators</h2>
            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($administrators as $administrator)
                        <tr>
                            <td>{{ $administrator->user->username }}</td>
                            <td>{{ $administrator->user->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
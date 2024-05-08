<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/post.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/following.css') }}">
    <link rel="stylesheet" href="{{ asset('css/createPost.css') }}">
    <link rel="stylesheet" href="{{ mix('css/profile_info.css') }}">
    <link rel="stylesheet" href="{{ mix('css/searchBar.css') }}">
</head>
<body>
    <nav>
        <ul>
            <!-- Always show Welcome -->
            <li><a href="{{ route('welcome') }}">Welcome</a></li>
        
            <!-- Show these links only to guests (not logged in) -->
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @endguest

            <!-- Show these links only to authenticated users -->
            @auth
                <li><a href="{{ route('profile') }}">Profile</a></li>
                <li><a href="{{ route('following') }}">Followed</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="nav-link">Logout</button>
                    </form>
                </li>
            @endauth
            <!-- SearchBar included here -->
            
        </ul>
        @include('components.searchBar')
    </nav>

    <div class="content">
        @yield('content')
    </div>

    <footer>
        <p>Writing Forum Project</p>
    </footer>
</body>
</html>
<div class="theme-navbar">
    <a href="{{ route('theme.posts', ['themeId' => $theme->themeId]) }}" class="btn btn-link">Posts</a>
    <a href="{{ route('theme.news', ['themeId' => $theme->themeId]) }}" class="btn btn-link">News</a>

    @auth
        @can('manage-theme', $theme)
            <a href="{{ route('theme.settings', ['themeId' => $theme->themeId]) }}" class="btn btn-link">Settings</a>
        @endcan
    @endauth

    @auth
        <form action="{{ route('theme.follow', ['themeId' => $theme->themeId]) }}" method="POST" class="follow-form">
            @csrf
            <button type="submit" class="btn btn-primary">
                {{ Auth::user()->themes->contains($theme->themeId) ? 'Unfollow' : 'Follow' }}
            </button>
        </form>
    @endauth
</div>
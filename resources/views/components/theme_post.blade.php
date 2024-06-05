<div class="theme-post">
    <div class="theme-header">
        <h2 class="theme-title">{{ $title }}</h2>
        <p class="theme-description">{{ $description }}</p>
    </div>
    <div class="theme-footer">
        <a href="{{ route('theme.show', ['themeId' => $themeId]) }}" class="btn btn-primary">Go to</a>
        @auth
            <form action="{{ route('theme.follow', ['themeId' => $themeId]) }}" method="POST" class="follow-form">
                @csrf
                <button type="submit" class="btn btn-primary">
                    Unfollow theme
                </button>
            </form>
        @endauth
    </div>
</div>
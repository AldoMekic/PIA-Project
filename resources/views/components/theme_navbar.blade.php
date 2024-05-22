<div class="theme-buttons">
    <a href="{{ route('theme.show', ['themeId' => $theme->themeId]) }}" class="btn-theme">Posts</a>
    <a href="{{ route('theme.news', ['themeId' => $theme->themeId]) }}" class="btn-theme">News</a>
    <a href="{{ route('theme.polls', ['themeId' => $theme->themeId]) }}" class="btn-theme">Polls</a>
</div>
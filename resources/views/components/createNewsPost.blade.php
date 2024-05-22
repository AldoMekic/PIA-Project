<div class="post create-post">
    <div class="post-header">
        <h2 class="post-title">Create New News Post</h2>
    </div>
    <div class="post-body">
        <form method="POST" action="{{ route('news.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" placeholder="Enter news title">
                @if ($errors->has('title'))
                    <span class="error-message">{{ $errors->first('title') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content" name="content" class="form-control" rows="4" placeholder="Enter news content"></textarea>
                @if ($errors->has('content'))
                    <span class="error-message">{{ $errors->first('content') }}</span>
                @endif
            </div>
            <input type="hidden" name="theme_id" value="{{ $theme->themeId }}">
            <button type="submit" class="btn-post">Create News</button>
        </form>
    </div>
</div>
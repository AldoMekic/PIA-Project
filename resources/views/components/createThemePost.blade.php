<div class="post create-post">
    <div class="post-header">
        <h2 class="post-title">Create New Post for {{ $theme->name }}</h2>
    </div>
    <div class="post-body">
        <form method="POST" action="{{ route('theme.post.store', ['themeId' => $theme->themeId]) }}">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" placeholder="Enter post title">
                @error('title')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content" name="content" class="form-control" rows="4" placeholder="Enter post content"></textarea>
                @error('content')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn-post">Post</button>
        </form>
    </div>
</div>
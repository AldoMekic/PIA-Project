<div class="create-post">
    <form method="POST" action="{{ route('post.store') }}">  
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Enter post title">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" name="content" class="form-control" rows="4" placeholder="Enter post content"></textarea>
        </div>
        <button type="submit" class="btn-post">Post</button>
    </form>
</div>
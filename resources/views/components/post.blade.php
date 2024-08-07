<div class="post">
    <div class="post-header">
        <h2 class="post-title">{{ $title }}</h2>
        <p class="post-author">Posted by: {{ $author }}</p>
    </div>
    <div class="post-body">
        <div class="post-content">{{ $slot }}</div>
    </div>
    @auth
    <div class="post-footer">
        <form action="{{ route('post.savePost', ['postID' => $postID]) }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit">Save</button>
        </form>
    </div>
    @endauth
</div>

<script>
    function savePost(postID) {
        fetch('/save-post', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ postID: postID })
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                alert('Post saved successfully!');
            } else {
                alert('Post already saved.');
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>
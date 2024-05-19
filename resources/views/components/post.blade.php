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
        <button onclick="toggleComment()">Comment</button>
        <button>Like</button>
        <button>Save</button>
    </div>
    <x-createComment id="comment-section" style="display: none;" />
    @endauth
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        function toggleComment() {
            var commentSection = document.getElementById('comment-section');
            if (commentSection.style.display === 'none' || commentSection.style.display === '') {
                commentSection.style.display = 'block';
            } else {
                commentSection.style.display = 'none';
            }
        }
    });
</script>
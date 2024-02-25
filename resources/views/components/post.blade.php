<div class="post">
    <h2 class="post-title">{{ $title }}</h2>
    <p class="post-author">Posted by: {{ $author }}</p>
    <div class="post-content">{{ $slot }}</div>
    <div class="post-buttons">
        <button>Like</button>
        <button>Comment</button>
        <button>Save</button>
    </div>
</div>
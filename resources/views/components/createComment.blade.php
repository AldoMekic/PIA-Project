<div class="create-comment">
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <textarea name="content" rows="3" cols="50"></textarea>
        <button type="submit">Post comment</button>
    </form>
</div>
<h2>Saved</h2>

<div class="following-container">
    @foreach ($posts as $post)
        <x-post :title="$post->title" :author="$post->author">
            {{ $post->content }}
        </x-post>
    @endforeach
</div>
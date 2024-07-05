<div class="create-theme">
    <h2>Create New Theme</h2>
    <form action="{{ route('theme.create') }}" method="POST">
        @csrf
        <label for="name">Theme Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>

        <button type="submit">Create</button>
    </form>
</div>
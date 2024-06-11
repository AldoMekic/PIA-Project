<div class="delete-account">
    <h3>Delete Account</h3>
    <p>If you delete your account, all of your posts will be deleted. Are you sure?</p>
    <button id="delete-account-button" class="btn btn-danger">Delete</button>

    <div id="delete-account-confirm" style="display: none;">
        <p>Doing this will delete your account. Are you sure?</p>
        <form action="{{ route('user.delete') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Confirm Account Deletion</button>
        </form>
    </div>
</div>

<script>
document.getElementById('delete-account-button').addEventListener('click', function() {
    document.getElementById('delete-account-confirm').style.display = 'block';
});
</script>
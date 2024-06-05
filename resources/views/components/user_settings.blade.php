<div class="user-settings">
    <form action="{{ route('user.changePassword') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="password">Change Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter new password">
        </div>
        <button type="submit" class="btn btn-primary">Change</button>
    </form>
</div>
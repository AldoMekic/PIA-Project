<div class="post create-post">
    <div class="post-header">
        <h2 class="post-title">Create New Poll</h2>
    </div>
    <div class="post-body">
        <form method="POST" action="{{ route('poll.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" placeholder="Enter poll title">
                @if ($errors->has('title'))
                    <span class="error-message">{{ $errors->first('title') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="optionOne">Option One</label>
                <input type="text" id="optionOne" name="optionOne" class="form-control" placeholder="Enter option one">
                @if ($errors->has('optionOne'))
                    <span class="error-message">{{ $errors->first('optionOne') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="optionTwo">Option Two</label>
                <input type="text" id="optionTwo" name="optionTwo" class="form-control" placeholder="Enter option two">
                @if ($errors->has('optionTwo'))
                    <span class="error-message">{{ $errors->first('optionTwo') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="optionThree">Option Three (Optional)</label>
                <input type="text" id="optionThree" name="optionThree" class="form-control" placeholder="Enter option three">
            </div>
            <div class="form-group">
                <label for="optionFour">Option Four (Optional)</label>
                <input type="text" id="optionFour" name="optionFour" class="form-control" placeholder="Enter option four">
            </div>
            <div class="form-group">
                <label for="optionFive">Option Five (Optional)</label>
                <input type="text" id="optionFive" name="optionFive" class="form-control" placeholder="Enter option five">
            </div>
            <input type="hidden" name="theme_id" value="{{ $theme->themeId }}">
            <button type="submit" class="btn-post">Create Poll</button>
        </form>
    </div>
</div>
<div class="post">
    <div class="post-header">
        <h2 class="post-title">{{ $title }}</h2>
        <p class="post-author">Posted by: {{ $author }}</p>
    </div>
    <div class="post-body">
        <form method="POST" action="{{ route('poll.vote', ['poll' => $pollId]) }}">
            @csrf
            <div class="form-group">
                <input type="radio" id="optionOne" name="option" value="optionOne">
                <label for="optionOne">{{ $optionOne }}</label><br>
                <input type="radio" id="optionTwo" name="option" value="optionTwo">
                <label for="optionTwo">{{ $optionTwo }}</label><br>
                @if ($optionThree)
                <input type="radio" id="optionThree" name="option" value="optionThree">
                <label for="optionThree">{{ $optionThree }}</label><br>
                @endif
                @if ($optionFour)
                <input type="radio" id="optionFour" name="option" value="optionFour">
                <label for="optionFour">{{ $optionFour }}</label><br>
                @endif
                @if ($optionFive)
                <input type="radio" id="optionFive" name="option" value="optionFive">
                <label for="optionFive">{{ $optionFive }}</label><br>
                @endif
            </div>
            <button type="submit" class="btn-post">Vote</button>
        </form>
    </div>
</div>
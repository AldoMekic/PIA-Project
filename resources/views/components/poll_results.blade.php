<div class="post">
    <div class="post-header">
        <h2 class="post-title">{{ $title }}</h2>
        <p class="post-author">Posted by: {{ $author }}</p>
    </div>
    <div class="post-body">
        <div class="poll-results">
            <p>{{ $optionOne }}: {{ $numOne }} votes</p>
            <p>{{ $optionTwo }}: {{ $numTwo }} votes</p>
            @if ($optionThree)
                <p>{{ $optionThree }}: {{ $numThree }} votes</p>
            @endif
            @if ($optionFour)
                <p>{{ $optionFour }}: {{ $numFour }} votes</p>
            @endif
            @if ($optionFive)
                <p>{{ $optionFive }}: {{ $numFive }} votes</p>
            @endif
        </div>
        <form method="POST" action="{{ route('poll.unvote', ['poll' => $pollId]) }}">
            @csrf
            <button type="submit" class="btn-post">Vote again</button>
        </form>
    </div>
</div>
<div class="post" id="poll-{{ $pollId }}">
    <div class="post-header">
        <h2 class="post-title">{{ $title }}</h2>
        <p class="post-author">Posted by: {{ $author }}</p>
    </div>
    <div class="post-body">
        <form method="POST" action="{{ route('poll.vote', ['poll' => $pollId]) }}" class="poll-form">
            @csrf
            <div class="form-group">
                <input type="radio" id="optionOne" name="option" value="optionOne" {{ $pollVoted ? 'disabled' : '' }}>
                <label for="optionOne">{{ $optionOne }} ({{ $numOne }} votes)</label><br>
                <input type="radio" id="optionTwo" name="option" value="optionTwo" {{ $pollVoted ? 'disabled' : '' }}>
                <label for="optionTwo">{{ $optionTwo }} ({{ $numTwo }} votes)</label><br>
                @if ($optionThree)
                    <input type="radio" id="optionThree" name="option" value="optionThree" {{ $pollVoted ? 'disabled' : '' }}>
                    <label for="optionThree">{{ $optionThree }} ({{ $numThree }} votes)</label><br>
                @endif
                @if ($optionFour)
                    <input type="radio" id="optionFour" name="option" value="optionFour" {{ $pollVoted ? 'disabled' : '' }}>
                    <label for="optionFour">{{ $optionFour }} ({{ $numFour }} votes)</label><br>
                @endif
                @if ($optionFive)
                    <input type="radio" id="optionFive" name="option" value="optionFive" {{ $pollVoted ? 'disabled' : '' }}>
                    <label for="optionFive">{{ $optionFive }} ({{ $numFive }} votes)</label><br>
                @endif
            </div>
            @if (!$pollVoted)
                <button type="submit" class="btn-post">Vote</button>
            @else
                <button type="button" class="btn-post" id="voteAgain">Vote Again?</button>
            @endif
        </form>
        
        <!-- Poll results -->
        <div class="poll-results" style="{{ $pollVoted ? 'display: block;' : 'display: none;' }}">
            @include('components.poll_results', ['pollId' => $pollId, 'title' => $title, 'author' => $author, 'optionOne' => $optionOne, 'numOne' => $numOne, 'optionTwo' => $optionTwo, 'numTwo' => $numTwo, 'optionThree' => $optionThree, 'numThree' => $numThree, 'optionFour' => $optionFour, 'numFour' => $numFour, 'optionFive' => $optionFive, 'numFive' => $numFive])
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var pollId = '{{ $pollId }}';
        var pollForm = document.querySelector('#poll-' + pollId + ' .poll-form');
        var voteAgainButton = document.querySelector('#poll-' + pollId + ' #voteAgain');
        var pollResults = document.querySelector('#poll-' + pollId + ' .poll-results');
        
        // Voting functionality
        pollForm.addEventListener('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(pollForm);
            fetch(pollForm.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update UI after voting
                    updatePollUI(true);
                }
            });
        });

        // Vote again functionality
        voteAgainButton.addEventListener('click', function() {
            fetch('{{ route('poll.unvote', ['poll' => $pollId]) }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update UI after unvoting
                    updatePollUI(false);
                }
            });
        });

        // Function to update UI based on vote state
        function updatePollUI(voted) {
            if (voted) {
                pollForm.style.display = 'none';
                pollResults.style.display = 'block';
            } else {
                pollForm.style.display = 'block';
                pollResults.style.display = 'none';
            }
        }
    });
</script>
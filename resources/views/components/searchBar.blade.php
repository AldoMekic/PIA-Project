<div class="search-bar">
    <form id="searchForm" method="GET" action="{{ route('search.themes') }}">
        @csrf
        <input type="text" id="searchInput" name="query" placeholder="Search themes..." class="search-input" onkeyup="showResults(this.value)">
        <button type="submit" class="search-button">Search</button>
    </form>
    <div id="searchResults" class="search-results"></div>
</div>

<script>
function showResults(value) {
    const searchResults = document.getElementById('searchResults');
    searchResults.innerHTML = ''; // Clear previous results

    if (value.length > 0) { // Start searching after 1 character
        fetch(`/search/themes?query=${value}`)
            .then(response => response.json())
            .then(data => {
                searchResults.innerHTML = ''; // Clear previous results
                if (data.length > 0) {
                    const link = document.createElement('a');
                    link.href = `/theme/${data[0].themeId}`;
                    link.textContent = data[0].name;
                    searchResults.appendChild(link);
                } else {
                    const noResults = document.createElement('p');
                    noResults.textContent = 'No Theme found';
                    searchResults.appendChild(noResults);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                searchResults.innerHTML = '<p>An error occurred while fetching themes.</p>';
            });
    }
}

// Handle form submission to select the first result
document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    const value = document.getElementById('searchInput').value.trim();
    if (value.length > 0) {
        fetch(`/search/themes?query=${value}`)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    // Redirect to the first result
                    window.location.href = `/theme/${data[0].themeId}`;
                } else {
                    // Show error message for no results
                    const searchResults = document.getElementById('searchResults');
                    searchResults.innerHTML = ''; // Clear previous results
                    const noResults = document.createElement('p');
                    noResults.textContent = 'No Theme found';
                    searchResults.appendChild(noResults);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                const searchResults = document.getElementById('searchResults');
                searchResults.innerHTML = '<p>An error occurred while fetching themes.</p>';
            });
    }
});
</script>
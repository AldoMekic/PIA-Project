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
                    data.forEach(theme => {
                        const link = document.createElement('a');
                        link.href = `/theme/${theme.themeId}`;
                        link.textContent = theme.name;
                        searchResults.appendChild(link);
                    });
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
</script>
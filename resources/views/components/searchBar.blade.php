<div class="search-bar">
    <form method="GET"> 
        <input type="text" id="searchInput" name="query" placeholder="Search..." class="search-input" onkeyup="showResults(this.value)">
        <button type="submit" class="search-button">Search</button>
    </form>
    <div id="searchResults" class="search-results"></div>
</div>

<script>
function showResults(value) {
    const searchResults = document.getElementById('searchResults');
    searchResults.innerHTML = ''; // Clear previous results
    if (value.toLowerCase().startsWith('t')) { // Checks if input starts with 't'
        const link = document.createElement('a');
        link.href = '/theme'; // Adjust URL as necessary
        link.textContent = 'Theme';
        searchResults.appendChild(link);
    }
}
</script>
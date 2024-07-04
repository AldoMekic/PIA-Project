@extends('layouts.app')

@section('title', 'Browsing')

@section('content')
    <div class="browsing-container">
        <h1>Browsing</h1>
        <div class="theme-row">
            @foreach($themes->slice(0, 3) as $theme)
                <x-theme-card :theme="$theme" />
            @endforeach
        </div>
        <div class="theme-row">
            @foreach($themes->slice(3, 3) as $theme)
                <x-theme-card :theme="$theme" />
            @endforeach
        </div>
        <div class="theme-row">
            @foreach($themes->slice(6, 3) as $theme)
                <x-theme-card :theme="$theme" />
            @endforeach
        </div>
        <div class="pagination-controls">
            <button id="prevBtn" disabled>Previous</button>
            <span id="currentPage">1</span>
            <button id="nextBtn" @if($themes->count() <= 9) disabled @endif>Next</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let currentPage = 1;
            const themes = @json($themes);
            const themesPerPage = 9;
            const totalPages = Math.ceil(themes.length / themesPerPage);

            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const currentPageSpan = document.getElementById('currentPage');

            function updatePagination() {
                const start = (currentPage - 1) * themesPerPage;
                const end = start + themesPerPage;
                const currentThemes = themes.slice(start, end);

                const themeRows = document.querySelectorAll('.theme-row');
                themeRows.forEach((row, rowIndex) => {
                    const rowThemes = currentThemes.slice(rowIndex * 3, (rowIndex + 1) * 3);
                    row.innerHTML = rowThemes.map(theme => `
                        <div class="theme-card">
                            <h3>${theme.name}</h3>
                            <a href="/theme/${theme.themeId}" class="btn">Check out</a>
                        </div>
                    `).join('');
                });

                currentPageSpan.textContent = currentPage;
                prevBtn.disabled = currentPage === 1;
                nextBtn.disabled = currentPage === totalPages;
            }

            prevBtn.addEventListener('click', function () {
                if (currentPage > 1) {
                    currentPage--;
                    updatePagination();
                }
            });

            nextBtn.addEventListener('click', function () {
                if (currentPage < totalPages) {
                    currentPage++;
                    updatePagination();
                }
            });

            updatePagination();
        });
    </script>
@endsection
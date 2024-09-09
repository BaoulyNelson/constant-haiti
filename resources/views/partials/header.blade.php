<header class="header">
    <div class="menu-icon" onclick="openPanel()"><i class="fas fa-bars"></i></div> <!-- Icône de menu -->
    <div class="logo">CONSTANT HAITI</div> <!-- Logo -->
    <ul class="nav-links">

        <li><a href="{{ route('articles.filterByCategory', 'Actualités') }}">Actualités</a></li>
        <li><a href="{{ route('articles.filterByCategory', 'International') }}">International</a></li>
        <li><a href="{{ route('articles.filterByCategory', 'Sports') }}">Sports</a></li>
        <li><a href="{{ route('articles.filterByCategory', 'Internet') }}">Internet</a></li>
        <li><a href="{{ route('articles.filterByCategory', 'Culture') }}">Culture</a></li>
        <li><a href="{{ route('articles.filterByCategory', 'Diplomatie') }}">Diplomatie</a></li>
        
        @if (auth()->check() && auth()->user()->isAdmin())
        <!-- Si l'utilisateur est connecté et est un administrateur -->
        <div class="profile-icon" style="color: white;">
            <a href="{{ route('admin.dashboard') }}" title="Tableau de bord">
                <i class="fas fa-user"></i>
            </a>
        </div>
        @elseif (auth()->check())
        <!-- Si l'utilisateur est connecté mais n'est pas un administrateur -->
        <div class="profile-icon" style="color: white;">
            <a href="{{ route('login') }}" title="Se connecter">
                <i class="fas fa-user"></i>
            </a>
        </div>
        @endif


    </ul>
    <div class="search-icon" onclick="openSearchModal()"><i class="fas fa-search"></i></div> <!-- Icône de recherche -->
</header>

<div id="sidePanel" class="side-panel">
    <a href="javascript:void(0)" class="close-btn" onclick="closePanel()">&times;</a>
    <!-- Les liens vont être ajoutés ici dynamiquement -->
</div><!-- Modal de recherche -->
<div id="searchModal" class="search-modal">
    <div class="search-modal-content">
        <a href="#" class="close-search-modal" onclick="closeSearchModal()">&times;</a>
        <form id="searchForm" action="{{ route('articles.search') }}" method="GET" onsubmit="return validateSearchForm()">
            <!-- Champ de recherche par mot-clé -->
            <input type="search" name="query" id="searchInput" placeholder="Rechercher des articles...">

            <!-- Sélecteur de catégorie -->
            <select name="category" id="categorySelect">
                <option value="">Toutes les catégories</option>
                <option value="Actualités">Actualités</option>
                <option value="International">International</option>
                <option value="Sports">Sports</option>
                <option value="Internet">Internet</option>
                <option value="Culture">Culture</option>
                <option value="Diplomatie">Diplomatie</option>
            </select>

            <button type="submit">Rechercher</button>
        </form>
    </div>
</div>

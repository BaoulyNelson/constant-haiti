<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Baouly Infos')</title>

    <!-- Liens vers les feuilles de style CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/stylesNavBar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/stylesPanneau.css') }}">
    <link rel="stylesheet" href="{{ asset('css/stylesRecherche.css') }}">
    <link rel="stylesheet" href="{{ asset('css/stylesCreer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/stylesLogin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/stylesArticles.css') }}">

    <!-- Lien CDN Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Lien Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>
    @include('partials.header')
  
    <main>
        <!-- Contenu principal de la page -->
        @yield('content')
     
    </main>
    
    @include('partials.footer')

    <!-- Lien CDN Bootstrap JavaScript (nécessaire pour certaines fonctionnalités) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- Scripts JavaScript personnalisés -->
    <script src="{{ asset('js/scriptToggle.js') }}"></script>
    <script src="{{ asset('js/scriptRecherche.js') }}"></script>
</body>
</html>

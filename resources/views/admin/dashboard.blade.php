@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if(auth()->check())
                    {{ __('Bienvenue, ') . auth()->user()->name }} - Tableau de Bord Administrateur
                    @else
                    {{ __('Tableau de Bord Administrateur') }}
                    @endif
                </div>

                <!-- Formulaire de déconnexion -->
                <form action="{{ route('logout') }}" method="POST" class="mb-3" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-link" style="padding: 0; border: none;">
                        <i class="fas fa-sign-out-alt" style="color: #dc3545; cursor: pointer;">logout</i>
                    </button>
                </form>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif


                    <!-- Boutons pour gérer les articles et les utilisateurs -->
                    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary mb-3">Géer les Articles</a>

                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mb-3">Gérer les Utilisateurs</a>

                    <ul>
                        @foreach ($articles as $article)
                        <li>
                            <strong>{{ $article->title }}</strong> -
                            <span>
                                Par {{ $article->author ? $article->author->name : 'Auteur inconnu' }} le
                                {{ $article->published_at ? $article->published_at->format('d/m/Y') : 'Date non disponible' }}
                            </span>


                            <a href="{{ route('admin.articles.edit', $article->id) }}">Éditer</a> |
                            <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">Supprimer</button>
                            </form>
                        </li>
                        @endforeach
                    </ul>


                    <!-- Statistiques (Exemple) -->
                    <div class="stats-container" style="background-color: #f8f9fa; padding: 20px; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
                        <h4 style="font-family: Arial, sans-serif; color: #333; font-size: 24px; border-bottom: 2px solid #007bff; padding-bottom: 5px; margin-bottom: 15px;">Statistiques</h4>
                        <ul style="list-style-type: none; padding-left: 0; font-family: Arial, sans-serif; font-size: 18px;">
                            <li style="padding: 5px 0; color: #555;">Total des articles : <strong>{{$totalArticles}}</strong></li>
                            <li style="padding: 5px 0; color: #555;">Total des utilisateurs : <strong>{{$totalUsers}}</strong></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
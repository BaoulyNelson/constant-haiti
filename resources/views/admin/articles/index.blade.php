@extends('layouts.app')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@elseif(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<div class="container">
    <div class="row">
        <!-- Articles de la catégorie spécifiée -->
        <div class="col-md-3">
            <h4>{{ $category }}</h4> <!-- Affiche la catégorie -->
            <ol>
                @foreach($articles->take(5) as $article)
                <li><a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a></li>
                @endforeach
            </ol>
        </div>

        <!-- Liste des articles avec leurs images -->
        <div class="col-md-9">
            @foreach($articles as $article)
            <div class="row mb-4">

                <div class="col-md-4">
                    <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid small-image" alt="{{ $article->title }}">
                </div>
                <div class="col-md-8">
                    <p>{{ Str::limit($article->content, 150) }}</p>
                    <!-- Formulaire pour supprimer un article -->
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                    <p><strong>Auteur :</strong> {{ $article->author->name }}</p> <!-- Nom de l'auteur -->
                    <p><strong>Date de publication :</strong> {{ $article->published_at->format('d/m/Y') }}</p> <!-- Date de publication -->
                    <a href="{{ route('articles.show', $article->id) }}">Lire la suite</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
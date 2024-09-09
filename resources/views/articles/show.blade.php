@extends('layouts.app')

@section('title', 'Titre spécifique pour cette page')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <!-- Contenu de l'article -->
        <div class="col-md-8 bg-white p-4 rounded shadow-sm">
            <h1 class="mb-4">{{ $article->title }}</h1>

            @if($article->image)
            <div class="mb-4">
                <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid rounded" alt="{{ $article->title }}">
            </div>
            @endif

            <p class="lead">{{ $article->content }}</p>
            
            <p><strong>Auteur :</strong> {{ $article->author->name }}</p> <!-- Nom de l'auteur -->
            <p><strong>Date de publication :</strong> {{ $article->published_at->format('d/m/Y') }}</p> <!-- Date de publication -->

            <!-- Lien pour revenir à la liste des articles -->
            <a href="{{ route('articles.index') }}" class="btn btn-primary mt-4">Retour à la liste des articles</a>
        </div>
    </div>
</div>
@endsection

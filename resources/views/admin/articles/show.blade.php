@extends('layouts.app')

@section('title', 'Titre spécifique pour cette page')

@section('content')
<div class="container">
    <div class="row">


        <!-- Contenu de l'article -->
        <div class="col-md-8">
            <h1>{{ $article->title }}</h1>
            <p>{{ $article->content }}</p>
            <!-- Image de l'article -->
            @if($article->image)
            <div class="col-md-4">
                <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid small-image" alt="{{ $article->title }}">
            </div>
            @endif
            <p><strong>Auteur :</strong> {{ $article->author->name }}</p> <!-- Nom de l'auteur -->
            <p><strong>Date de publication :</strong> {{ $article->published_at->format('d/m/Y') }}</p> <!-- Date de publication -->
        </div>
    </div>
    <!-- Lien pour revenir à la liste des articles -->
    <a href="{{ route('admin.articles.index') }}" class="btn btn-primary">Retour à la liste des articles</a>
</div>
@endsection
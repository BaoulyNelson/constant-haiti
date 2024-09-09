@extends('layouts.app')

@section('content')
<div class="container my-5">
    <!-- Catégorie de l'article en titre -->
    <h2 class="text-center mb-4">{{ $category }}</h2>
    
    <!-- Grille des articles -->
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($articles as $article)
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <!-- Image de l'article -->
                <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}" style="object-fit: cover; height: 200px;">

                <div class="card-body">
                    <!-- Titre de l'article -->
                    <h5 class="card-title">{{ $article->title }}</h5>
                    
                    <!-- Extrait du contenu -->
                    <p class="card-text">{{ Str::limit($article->content, 100) }}</p>

                    <!-- Auteur et Date -->
                    <small class="text-muted d-block mb-2">
                        <strong>Auteur :</strong> {{ $article->author->name }} | 
                        <strong>Date :</strong> {{ $article->published_at->format('d/m/Y') }}
                    </small>
                    
                    <!-- Lien vers l'article complet -->
                    <a href="{{ route('articles.show', $article->id) }}" class="btn btn-sm btn-primary">Lire la suite</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $articles->links() }}
    </div>
</div>
@endsection

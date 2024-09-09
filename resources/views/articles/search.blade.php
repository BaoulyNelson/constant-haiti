@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Résultats de la recherche</h1>
    @if($articles->count())
        <div class="row">
            @foreach($articles as $article)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ Str::limit($article->content, 150) }}</p>
                            <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary">Lire la suite</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $articles->links() }} <!-- Liens de pagination -->
    @else
        <p>Aucun article trouvé.</p>
    @endif
</div>
@endsection

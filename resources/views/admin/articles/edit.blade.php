@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Modifier l'article</h1>
    <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $article->title) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="content" class="form-label">Contenu</label>
            <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content', $article->content) }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="category" class="form-label">Catégorie</label>
            <select name="category" id="category" class="form-select" required>
                @foreach($categories as $cat)
                    <option value="{{ $cat }}" {{ $cat == $article->category ? 'selected' : '' }}>
                        {{ $cat }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="image" class="form-label">Image (optionnelle)</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($article->image)
                <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid mt-2" alt="{{ $article->title }}">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection

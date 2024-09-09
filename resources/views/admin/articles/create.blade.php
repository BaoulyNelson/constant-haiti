@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            <h2>Créer un nouvel article</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4">
                    <label for="title" class="form-label">Titre</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Entrez le titre de l'article" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="category" class="form-label">Catégorie</label>
                    <select name="category" id="category" class="form-control" required>
                        <option value="">Choisissez une catégorie</option>
                        @foreach($categories as $category)
                            <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>



                <div class="form-group mb-4">
                    <label for="content" class="form-label">Contenu</label>
                    <textarea name="content" id="content" class="form-control" rows="6" placeholder="Écrivez le contenu de l'article" required>{{ old('content') }}</textarea>
                    @error('content')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="image" class="form-label">Image (optionnelle)</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @error('image')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="author_id" class="form-label">Auteur</label>
                    <select name="author_id" id="author_id" class="form-control" required>
                        <option value="">Choisissez un auteur</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('author_id')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-success btn-block">Créer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

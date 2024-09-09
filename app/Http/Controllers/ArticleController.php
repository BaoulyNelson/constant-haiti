<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;

class ArticleController extends Controller
{
    // Affiche tous les articles
    public function index()
    {
        $totalArticles = Article::count(); // Compte tous les articles
        $totalUsers = User::count(); // Compte tous les utilisateurs
        $articles = Article::with('author')->paginate(10);
        return view('admin.dashboard', compact('articles','totalArticles','totalUsers'));
    }


    // Affiche un article spécifique
    public function show($id)
    {
        $article = Article::findOrFail($id); // Trouve l'article par ID ou échoue
        return view('articles.show', compact('article')); // Remplace 'articles.show' par le chemin de ta vue
    }

    // Affiche le formulaire pour créer un nouvel article
    public function create()
    {
        $users = User::all(); // Récupère tous les utilisateurs
        $categories = ['Actualités', 'International', 'Sports', 'Internet', 'Culture', 'Diplomatie'];
        return view('admin.articles.create', compact('categories','users')); // Passe les catégories à la vue
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required|string', // Validation de la catégorie
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
            'author_id' => 'required|exists:users,id',
        ]);

        // Crée un nouvel article
        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->category = $request->category; // Assigner la catégorie
        $article->author_id = $request->input('author_id');
        $article->published_at = now(); // Définit la date de publication à l'heure actuelle

        // Gestion de l'image
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $article->image = $path;
        }

        if ($article->save()) {
            // Ajoute un message flash de succès
            session()->flash('success', 'L\'article a été créé avec succès.');
        } else {
            // Ajoute un message flash d'échec
            session()->flash('error', 'Échec de la création de l\'article.');
        }

        // Redirige vers la liste des articles
        return redirect()->route('admin.articles.index');
    }


    // Affiche le formulaire pour éditer un article existant
    public function edit($id)
    {
        $article = Article::findOrFail($id); // Trouve l'article par ID ou échoue
        $categories = ['Actualités', 'International', 'Sports', 'Internet', 'Culture', 'Diplomatie'];
        return view('admin.articles.edit', compact('article', 'categories')); // Passe les catégories à la vue d'édition
    }

    // Met à jour un article existant dans la base de données
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required|string', // Validation de la catégorie
            'image' => 'nullable|image|max:2048',
            'author_id' => 'required|exists:users,id',

        ]);

        $article->title = $request->title;
        $article->content = $request->content;
        $article->category = $request->category; // Assigner la catégorie
        $article->author_id = $request->input('author_id');
        $article->published_at = now(); // Définit la date de publication à l'heure actuelle


        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $article->image = $path;
        }

        if ($article->save()) {
            // Ajoute un message flash de succès
            session()->flash('success', 'L\'article a été édité avec succès.');
        } else {
            // Ajoute un message flash d'échec
            session()->flash('error', 'Échec de la modification de l\'article.');
        }
        return redirect()->route('admin.articles.index'); // Redirige vers la liste des articles après la mise à jour
    }

    // Supprime un article existant de la base de données
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        // Ajoute un message flash de succès
        session()->flash('success', 'L\'article a été supprimé avec succès.');
        return redirect()->route('admin.articles.index'); // Redirige vers la liste des articles après la suppression
    }

    public function filterByCategory($category)
    {
        // Validation de la catégorie
        $validCategories = ['Actualités', 'International', 'Sports', 'Internet', 'Culture', 'Diplomatie'];
        if (!in_array($category, $validCategories)) {
            abort(404); // Catégorie invalide
        }

        // Récupération des articles pour la catégorie donnée
        $articles = Article::where('category', $category)->paginate(10);

        // Retourne la vue avec les articles
        return view('articles.index', compact('articles', 'category'));
    }
    public function search(Request $request)
    {
        $request->validate([
            'query' => 'nullable|string|max:255',
            'category' => 'nullable|string|in:Actualités,International,Sports,Internet,Culture,Diplomatie',
        ]);

        $query = $request->input('query');
        $category = $request->input('category');

        $articles = Article::when($query, function ($queryBuilder, $query) {
            return $queryBuilder->where('title', 'like', "%{$query}%")
                ->orWhere('content', 'like', "%{$query}%");
        })->when($category, function ($queryBuilder, $category) {
            return $queryBuilder->where('category', $category);
        })->paginate(10);

        return view('articles.index', compact('articles'));
    }
}

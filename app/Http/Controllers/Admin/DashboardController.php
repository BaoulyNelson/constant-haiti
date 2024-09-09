<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User; // Importation nécessaire

class DashboardController extends Controller
{
    
    public function index()
    {
        $articles = Article::all(); // Récupère tous les articles
        $totalArticles = Article::count(); // Compte tous les articles
        $totalUsers = User::count(); // Compte tous les utilisateurs
    
        return view('admin.dashboard', compact('articles', 'totalArticles', 'totalUsers'));
    }
    
    
}

<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage() {
        $article = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(6)->get();
        return view('welcome', compact('article'));
    }

    public function searchArticles(Request $request) {
        $query = $request->input('query');
        $article = Article::search($query)->where('is_accepted', true)->paginate(10);
        return view('article.searched', ['article' => $article, 'query' => $query]);
    }
}

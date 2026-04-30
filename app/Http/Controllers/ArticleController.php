<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // ======================
    // USER (HALAMAN DEPAN)
    // ======================
    public function publicIndex()
    {
        $articles = Article::latest()->get();
        return view('articles.index', compact('articles'));
    }

    public function show(string $id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    // ======================
    // ADMIN
    // ======================
    public function index()
    {
        $articles = Article::all();
        return view('admin.index', compact('articles')); // ✅ INI YANG PENTING
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        Article::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect('/admin/articles');
    }

    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
        return view('admin.edit', compact('article'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $article = Article::findOrFail($id);

        $article->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect('/admin/articles');
    }

    public function destroy(string $id)
    {
        Article::destroy($id);
        return back();
    }
}
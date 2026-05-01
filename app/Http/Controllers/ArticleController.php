<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function publicIndex()
    {
        $articles = Article::latest()->get();
        return view('articles.index', compact('articles'));
    }

    public function index()
    {
        $articles = Article::all();
        return view('admin.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
        }

        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath
        ]);

        return redirect('/admin/articles');
    }

    public function show(string $id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
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
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $article = Article::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
            $article->image = $imagePath;
        }

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
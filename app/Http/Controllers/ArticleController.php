<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    // ✅ Daftar semua artikel
    public function index()
    {
        $articles = Article::with('user')->latest()->get();
        return view('articles.index', compact('articles'));
    }

    // ✅ Detail artikel tunggal
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    // ✅ Form tambah artikel
    public function create()
    {
        return view('articles.create');
    }

    // ✅ Simpan artikel baru
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Article::create([
            'title'   => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dibuat');
    }

    // ✅ Form edit artikel
    public function edit(Article $article)
    {
        $this->authorize('update', $article);
        return view('articles.edit', compact('article'));
    }

    // ✅ Update artikel
    public function update(Request $request, Article $article)
    {
        $this->authorize('update', $article);

        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $article->update($request->only('title', 'content'));

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil diperbarui');
    }

    // ✅ Hapus artikel
    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('dashboard', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $article = Article::create([
            'title' => $request->title,
            'description' => $request->description,
            'tag_id' => $request->tag_id,
            'user_id' => $request->user_id,
        ]);

        if($article) {
            return redirect()->route('articles.index');
        } else {
            return view('articles.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $article->title = $request->title;
        $article->description = $request->description;
        $article->tag_id = $request->tag_id;

        if($article->save()) {
            return redirect()->route('articles.index');
        } else {
            return view('articles.edit', compact('article'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('dashboard');
    }
}

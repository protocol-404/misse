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
        $article = Article::all();
        return view('dashboard', compact($article));
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
        $credentials = Article::create([
            'title' => $request->title,
            'description' => $request->description,
            'tag_id' => $request->tag_id,
            'user_id' => $request->user_id,
        ]);

        if($credentials) {
            return redirect('articles.index');
        } else {
            return view('articles.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact($article));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.update');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $article->name = $request->name;
        $article->price = $request->price;
        $article->description = $request->description;

        if($article->save()) {
            return redirect('articles.index');
        } else {
            return view('articles.update', compact('article'));
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        Article::deleted($article);
        return ('dashboard');
    }
}

<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ArticleController as BaseArticleController;
use Illuminate\Support\Facades\Auth;

use App\Article;
use App\Http\Requests\ArticleRequest;

class ArticleController extends BaseArticleController
{
    protected $routes = [
        'index' => 'my-article.index',
        'create' => 'my-article.create',
        'store' => 'my-article.store',
        'show' => 'my-article.show',
        'edit' => 'my-article.edit',
        'update' => 'my-article.update',   
        'destroy' => 'my-article.destroy',   
    ];


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::authorized()
            ->orderBy('published_at', 'desc')
            ->paginate(15);
       return view('article.index')->with([
            'articles' => $articles,
            'routes' => $this->routes,
        ]);
    }


}

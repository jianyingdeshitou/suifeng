<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ArticleController as BaseController;
use Illuminate\Support\Facades\Auth;

use App\Article;
use App\Http\Requests\ArticleRequest;

class ArticleController extends BaseController
{
    protected $route_index = 'my-article.index';
    protected $route_create = 'my-article.create';
    protected $route_store = 'my-article.store';
    protected $route_show = 'my-article.show';
    protected $route_edit = 'my-article.edit';
    protected $route_update = 'my-article.update';
    protected $route_destroy = 'my-article.destroy';

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
            'route_create' => $this->route_create,
            'route_show' => $this->route_show,
            'route_edit' => $this->route_edit,
            'route_destroy' => $this->route_destroy,
        ]);
    }


}

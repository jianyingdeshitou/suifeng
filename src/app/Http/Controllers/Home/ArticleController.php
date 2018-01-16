<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Article;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('create', Article::class)) {
            return view('article.create')->with(['route_store' => $this->route_store]);
        }
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        if (Auth::user()->can('create', Article::class)) {
            if (Article::storeRequest($request)) {
                return redirect(route($this->route_index));
            }
        }
        return redirect()->back()->withInput()->withErrors('保存失败！');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::with('user')->findOrFail($id);
        return view('article.show')->with([
            'article' => $article,
            'route_edit' => $this->route_edit,
            'route_destroy' => $this->route_destroy,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        if (Auth::user()->can('update', $article)) {
            return view('article.edit')->with([
                'article' => $article,
                'route_update' => $this->route_update,
            ]);
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\ArticleRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        if (Auth::user()->can('update', $article)) {
            if ($article->updateRequest($request)) {
                return redirect(route($this->route_show, ['id' => $id]));
            }
        }
        return redirect()->back()->withInput()->withErrors('更新失败！');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        if (Auth::user()->can('delete', $article)) {
            if ($article->delete()) {
                return redirect(route($this->route_index));
            }
        }
        return redirect()->back()->withInput()->withErrors('删除失败！');
    }
}

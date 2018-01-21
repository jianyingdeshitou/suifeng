<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Article;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    protected $routes = [
        'index' => 'article.index',
        'create' => 'article.create',
        'store' => 'article.store',
        'show' => 'article.show',
        'edit' => 'article.edit',
        'update' => 'article.update',   
        'destroy' => 'article.destroy',   
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::published()
            ->orderBy('published_at', 'desc')
            ->paginate(15);
        return view('article.index')
            ->with([
                'articles' => $articles,
                'routes' => $this->routes,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ($this->canCreate()) {
            $article = new Article();
            $article->fill([
                'title' => '',
                'content' => '',
                'publshed' => false,
            ]);
            return view('article.create')->with([
                'article' => $article,
                'routes' => $this->routes,
            ]);
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
        $title = $request->input['title'];
        if ($this->canCreate()) {
            if (Article::storeRequest($request)) {
                return redirect()->route($this->routes['index'])
                    ->withSuccess($title.' 保存成功！');
            }
        }
        return redirect()->back()->withInput()
            ->withErrors($title.' 保存失败！');
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
            'routes' => $this->routes,
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
        if ($this->canUpdate($article)) {
            return view('article.edit')->with([
                'article' => $article,
                'routes' => $this->routes,
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
        if ($this->canUpdate($article)) {
            if ($article->updateRequest($request)) {
                return redirect()->route($this->routes['show'], ['id' => $id])
                    ->withSuccess($article->title.' 更新成功！');
            }
        }
        return redirect()->back()->withInput()
            ->withErrors($article->title.' 更新失败！');
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
        if ($this->canDelete($article)) {
            if ($article->delete()) {
                 return redirect()->route($this->routes['index'])
                    ->withSuccess($article->title.' 删除成功！');
            }
        }
        return redirect()->back()->withInput()
            ->withErrors($article->title.' 删除失败！');
    }

    /**
     * 判断当前用户是否可以创建文章
     * @return [boolean] [能，不能]
     */
    public function canCreate(){
        return Auth::check() && Auth::user()->can('create', Article::class);
    }

    /**
     * 判断当前用户是否可以更新文章
     * @return [boolean] [能，不能]
     */
    public function canUpdate(Article $article){
        return Auth::check() && Auth::user()->can('update', $article);
    }

    /**
     * 判断当前用户是否可以删除文章
     * @return [boolean] [能，不能]
     */
    public function canDelete(Article $article){
        return Auth::check() && Auth::user()->can('delete', $article);
    }
}

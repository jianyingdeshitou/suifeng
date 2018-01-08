<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

class HomeController extends Controller
{
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::authorized()
            ->orderBy('updated_at', 'desc')
            ->paginate(15);
        return view('home')->with(['articles' => $articles]);
    }
}

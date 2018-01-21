<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Tag;
use App\Http\Requests\TagCreateRequest;
use App\Http\Requests\TagEditRequest;

class TagController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $tags = Tag::all();
	    return view('tag.index')->with(['tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = new Tag;
        $tag->fill([
            'tag' => old('tag') ?: '',
            'title' => old('title') ?: '',
            'subtitle' => old('subtitle') ?: '',
            'meta_description' => old('meta_description') ?: '',
            'page_image' => old('page_image') ?: '',
        ]);
        return view('tag.create')->with(['tag' => $tag]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagCreateRequest $request)
    {
        $tag = $request->input['tag'];
        if ($this->canCreate()) {
            if (Tag::storeRequest($request)) {
                return redirect()->route('tag.index')
                    ->withSuccess($tag.' 保存成功！');
            }
        }
        return redirect()->back()->withInput()
            ->withErrors($tag.' 保存失败！');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        if ($this->canUpdate($tag)) {
            return view('tag.edit')->with([
                'tag' => $tag,
            ]);
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagEditRequest $request, $id)
    {
        $tag = Tag::findOrFail($id);
        if ($this->canUpdate($tag)) {
            if ($tag->updateRequest($request)) {
                return redirect()->route('tag.index')
                    ->withSuccess($tag->tag.' 更新成功！');
            }
        }
        return redirect()->back()->withInput()
            ->withErrors($tag->tag.' 更新失败！');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $name =$tag->tag;
        if ($this->canDelete($tag)) {
            if ($tag->delete()) {
                 return redirect()->route('tag.index')
                    ->withSuccess($name.' 删除成功！');
            }
        }
        return redirect()->back()->withInput()
            ->withErrors($name.' 删除失败！');
    }

        /**
     * 判断当前用户是否可以创建文章
     * @return [boolean] [能，不能]
     */
    public function canCreate(){
        return Auth::check();
    }

    /**
     * 判断当前用户是否可以更新文章
     * @return [boolean] [能，不能]
     */
    public function canUpdate(Tag $tag){
        return Auth::check();
    }

    /**
     * 判断当前用户是否可以删除文章
     * @return [boolean] [能，不能]
     */
    public function canDelete(Tag $tag){
        return Auth::check();
    }
}

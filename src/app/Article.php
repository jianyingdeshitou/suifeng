<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use \Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\ArticleRequest;

class Article extends Model
{
    /**
     * 不可被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];


    public static function storeRequest(ArticleRequest $request)
    {
        $article = new Article;
        $article->fill([
                'user_id' => Auth::id(),
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'published' => $request->input('published'),
            ]);
        return $article->save();
    }

    public function updateRequest(ArticleRequest $request)
    {
        $this->fill([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'published' => $request->input('published'),
            ]);
        return $this->update();
    }

    /**
     * 获得所属的用户。
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * 限制查询只包括登录的用户。
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAuthorized(Builder $query)
    {
        return $query->where('user_id', Auth::id());
    }

    /**
     * 限制查询只包括发布的文章。
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished(Builder $query)
    {
        return $query->whereNotNull('published_at')
            ->where('published_at', '<=', Carbon::now());
    }

    /**
     * 设置 published_at 属性
     * @param [boolean] $value 是否发布
     */
    public function setPublishedAttribute($value){
        $this->published_at = (bool) $value 
            ? Carbon::now() : null;
    }

    /**
     * 获取 published_at 属性
     * @return [boolean] 是否发布
     */
    public function getPublishedAttribute() {
        if (isset($this->published_at) 
            && $this->published_at <= Carbon::now()) {
            return true;
        }
        return false;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Article extends Model
{
    /**
     * 不可被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

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
    public function scopeAuthorized($query)
    {
        return $query->where('user_id', Auth::id());
    }

    /**
     * 限制查询只包括发布的文章。
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', Carbon::now());
    }
}

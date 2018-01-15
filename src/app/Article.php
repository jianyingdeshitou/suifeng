<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use \Illuminate\Database\Eloquent\Builder;

class Article extends Model
{
    /**
     * 不可被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * 应被转换为日期的属性。
     *
     * @var array
     */
    // protected $dates = [
    //     'created_at',
    //     'updated_at',
    //     'published_at'
    // ];

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

    public function setPublishedAttribute($value){
        $this->published_at = (bool) $value 
            ? Carbon::now() : null;
    }

    public function getPublishedAttribute() {
        if (isset($this->published_at) 
            && $this->published_at <= Carbon::now()) {
            return true;
        }
        return false;
    }
}

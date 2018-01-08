<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{
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

}

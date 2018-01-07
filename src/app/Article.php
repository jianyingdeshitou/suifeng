<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * 获得所属的用户。
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

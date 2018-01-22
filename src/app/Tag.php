<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Http\Requests\TagCreateRequest;
use App\Http\Requests\TagEditRequest;

class Tag extends Model
{
    /**
     * 不可被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static function storeRequest(TagCreateRequest $request)
    {
        $article = new Tag;
        $article->fill([
            'tag' => $request->input('tag'),
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'meta_description' => $request->input('meta_description'),
            'page_image' => $request->input('page_image'),
        ]);
        return $article->save();
    }

    public function updateRequest(TagEditRequest $request)
    {
        $this->fill([
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'meta_description' => $request->input('meta_description'),
            'page_image' => $request->input('page_image'),
            ]);
        return $this->update();
    }
}

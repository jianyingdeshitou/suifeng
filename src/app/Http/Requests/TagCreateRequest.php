<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tag' => 'sometimes|string|max:255|unique:tags',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'meta_description' => 'required',
            'page_image' => 'required',
        ];
    }
}

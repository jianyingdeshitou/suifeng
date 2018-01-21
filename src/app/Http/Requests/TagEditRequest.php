<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagEditRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'meta_description' => 'required',
            'page_image' => 'required',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'news_category_id' => 'exists:news_categories,id',
            'title' => 'required',
            'slug' => 'required|unique:news,slug',
            'description' => 'required',
            'details' => 'required',
            'featured_image' => 'file',
            'is_hidden' => '',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'description' => '',
            'document_category_id' => 'exists:document_categories,id',
            'attachment' => '',
            'document_permission' => '',
            'is_featured' => '',
            'password' => '',
        ];
    }
}

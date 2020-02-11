<?php

namespace App\Http\Requests;

class ProductIndexRequest extends FormRequest
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
            'categories_id' => 'nullable|array',
            'categories_id.*' => 'int|exists:categories,id',
            'tags_id' => 'nullable|array',
            'tags_id.*' => 'int|exists:tags,id',
            'color_id' => 'nullable|int|exists:colors,id',
        ];
    }
}

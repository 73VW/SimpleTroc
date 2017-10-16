<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductForm extends FormRequest
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
            'name' => 'required|string|min:2',
            'price' => 'required|numeric',
            'description' => 'required|string|min:5',
            'image' => '',
            'image.*' => 'mimes:jpg,jpeg,png,gif,bmp',
        ];
    }
}

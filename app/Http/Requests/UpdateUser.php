<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
        $rules = [
            'name' => 'required|string|min:2',
            'city' => 'required|string|max:100',
            'address' => 'required|string|max:100',
            'npa' => 'required|string|max:100',
        ];
        /**
         * Email have to be unique.
         * we check if new email is unique
         */
        if(request('email') != auth()->user()->email){
            $rules['email'] = 'required|string|email|max:255|unique:users';
        }
        return $rules;
    }
}

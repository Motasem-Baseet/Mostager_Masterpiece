<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $rules = [
            'name' =>[
                'required',
                'string',
                'max:50'

            ],
            'description' =>[
                'required',
            ],
        ];

        return $rules;
    }
}

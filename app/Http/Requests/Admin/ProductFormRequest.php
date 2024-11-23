<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'user_id' =>[
                'required',

            ],
            'category_id' =>[
                'required',


            ],
            'name' =>[
                'required',
                'string',
                'max:50'

            ],
            'description' =>[
                'required',
            ],
            'price_per_day' =>[
                'required',
                'numeric'
            ],
            'status' =>[
                'required',
            ],
            'image' =>[
                'required',
                'image',
                'mimes:jpeg,png,jpg,gif',
                'max:2048'
            ],
        ];


        return $rules;
    }
}

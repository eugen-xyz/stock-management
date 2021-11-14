<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $method = request()->method();

        $name = 'required|string|unique:products,name';
        if($method != 'post') {
            $name = 'required|string';
        }

        return [
            'name'      => $name,
            'price'     => 'required|numeric',
            'quantity'  => 'required|numeric',
        ];
    }
}

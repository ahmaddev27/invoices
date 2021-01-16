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


    public function rules()
    {
        return [
            'Product_name' => 'required|max:50',
            'description' => 'required',
            'section_id' => 'required',


        ];
    }


    public function messages()
    {

        return [
            'Product_name.required' => 'ادخل اسم للمنتج ',
            'Product_name.max' => 'اسم المنتج طويل جدا',
            'description.required' => 'ادخل وصف للمنتج',
            'section_id'=>'اختر قسم للمنتج'


        ];
    }

}

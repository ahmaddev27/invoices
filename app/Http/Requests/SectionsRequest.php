<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionsRequest extends FormRequest
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
            'section_name' => 'required|max:50|unique:sections,section_name,',
            'description' => 'required',


        ];
    }


    public function messages()
    {

        return [
            'section_name.required' => 'ادخل اسم للقسم ',
            'section_name.unique'   =>'اسم القسم مسجل مسبقا',
            'section_name.max' => 'اسم القسم طويل جدا',
            'description.required' => 'ادخل وصف للقسم',


        ];
    }

}

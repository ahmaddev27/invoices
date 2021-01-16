<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'name' => 'required|max:50|unique:roles,name,',
            'permissions' => 'required | array | min:1',


        ];
    }


    public function messages()
    {

        return [
            'name.required' => 'ادخل اسم للصلاحية ',
            'name.unique' => 'اسم الصلاحية مسجل مسبقا ',
            'permissions.required' => 'اختر صلاحيات ',


        ];
    }

}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditInvoiceRequest extends FormRequest
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

            'invoice_number' => 'required|max:50|unique:invoices,invoice_number,'.$this->id,
            'invoice_Date' => 'required',
            'Due_date' => 'required',
            'section_id' => 'required',
            'product' => 'required',
            'file' => 'mimes:jpg,pdf,png,jpeg',

        ];
    }


    public function messages()
    {

        return [
            'invoice_number.required' => 'يجب ادخال رقم للفاتورة',
            'invoice_number.unique' => 'رقم الفاتورة مسجل مسبقا',
            'invoice_number.max' => 'رقم الفاتورة طويل جدا',
            'Due_date.required' => 'يجب ادخال تاريخ انتهاء للفاتورة',
            'section_id.required' => 'يجب اختيار قسم  للفاتورة',
            'product.required' => 'يجب اختيار منتج  للفاتورة',



        ];
    }


}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'invoice_number' => 'required|max:50|unique:invoices_details,invoice_number',
            'invoice_Date' => 'required',
            'Due_date' => 'required',
            'section_id' => 'required',
            'Value_VAT' => 'required',
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
            'Value_VAT.required' => 'يجب اختيار نسبة ضريبة القيمة المضافة للفاتورة',



        ];
    }

}

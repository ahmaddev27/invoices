<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoices extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'invoice_number',
        'invoice_Date',
        'Due_date',
        'product',
        'section_id',
        'Amount_collection',
        'Amount_Commission',
        'Discount',
        'Value_VAT',
        'Rate_VAT',
        'Total',
        'Status',
        'Value_Status',
        'Payment_Date',
    ];

    protected $dates = ['deleted_at'];

 public function section()
   {
   return $this->belongsTo(Sections::class);
   }

    public function invoiceDetials()
    {
        return $this->hasOne(Invoices_details::class);
    }
    public function attachment()
    {
        return $this->hasOne(Invoice_attachments::class);
    }
}

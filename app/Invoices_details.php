<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoices_details extends Model
{
    protected $fillable = [
        'invoices_id',
        'invoice_number',
        'product',
        'Section',
        'Status',
        'Value_Status',
        'note',
        'user',
        'Payment_Date',
    ];



    public function invoice()
    {
        return $this->belongsTo(Invoices::class);
    }
}

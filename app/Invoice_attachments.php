<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_attachments extends Model
{

    protected $guarded=[];


    public static function saveFile($request){

        $file = $request->file('file');
        $file_name = date('d-y-m');
        $ext = strtolower($file->getClientOriginalExtension());
        $file_full_name = $file_name.'.'.$ext;
        $upload_path = 'files/'.$request->invoice_number;
        $file_url = $file_full_name;
        $file->move($upload_path,$file_full_name);
        return $file_url;

    }


    public function invoice()
    {
        return $this->belongsTo(Invoices::class);
    }


}

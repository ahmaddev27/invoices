<?php

namespace App\Http\Controllers;

use App\Exports\InvoicesExport;
use App\Http\Requests\EditInvoiceRequest;
use App\Http\Requests\InvoiceRequest;
use App\Invoice_attachments;
use App\Invoices;
use App\Invoices_details;
use App\Notifications\AddInvoice;
use App\Product;
use App\Sections;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class InvoicesController extends Controller
{


    public function __construct()
    {
//        $this->middleware('permission:read_invoices')->only(['index','print','indexArchive','show']);
//        $this->middleware('permission:create_sections')->only(['create','store']);
//        $this->middleware('permission:update_invoices')->only(['edit','update','status']);
//        $this->middleware('permission:delete_invoices')->only(['destroy']);
//        $this->middleware('permission:archive_invoices')->only(['archive','unarchive']);

    }


    public function index()
    {

        $invoices=Invoices::all();

        return view('invoices.all',compact('invoices'));
    }

    public function create()
    {
        $sections=Sections::all();

        return view('invoices.add',compact('sections'));
    }


    public function store(InvoiceRequest $request)
    {

        $invoice= Invoices::create($request->all());
        Invoices_details::create([
                'invoices_id'=>$invoice->id,
                'Section'=>$invoice->section->section_name,
                'user'=>auth()->user()->name]+$request->all());
        if ($request->hasFile('file')) {
            Invoice_attachments::create([
                'invoices_id'=>$invoice->id,
                'Created_by'=>auth()->user()->name,
                'invoice_number'=>$request->invoice_number,
                'file_name' =>Invoice_attachments::saveFile($request),

            ]);
        }

        $users = User::all();
        foreach ($users as $user) {
            $user->notify(new AddInvoice($invoice));
        }



        return redirect()->route('invoices.index')
            ->with(['message' => 'تمت الاضافة بنجاح', 'alert-type' => 'success']);
    }


    public function show($id)
    {
        $invoice=Invoices::find($id);
        return  view('invoices.show',compact('invoice'));
    }


    public function edit($id)
    {
        $invoice=Invoices::find($id);
        $sections=Sections::all();
        return view('invoices.edit',compact('sections','invoice'));

    }


    public function update(EditInvoiceRequest $request,$id)
    {

        $invoice=Invoices::findOrFail($id);
        $invoice->update($request->all());

        Invoices_details::where('invoices_id', $id)->first()->update([
                'invoices_id'=>$invoice->id,
                'Section'=>$invoice->section->section_name,
                'user'=>auth()->user()->name]
            +$request->all());


        if ($request->file) {
            $destinationPath = public_path('files/'.$request->old_file);
            File::deleteDirectory($destinationPath);

            Invoices_details::where('invoices_id', $id)->first()->update([
                'invoices_id'=>$invoice->id,
                'Created_by'=>auth()->user()->name,
                'invoice_number'=>$request->invoice_number,
                'file_name' =>Invoice_attachments::saveFile($request),


            ]);
            return redirect()->route('invoices.index')
                ->with(['message' => 'تم التعديل بنجاح', 'alert-type' => 'success']);

        }else{
            return redirect()->route('invoices.index')
                ->with(['message' => 'تم التعديل بنجاح', 'alert-type' => 'success']);
        }

    }


    public function destroy(Request $request)
    {
        $invoice= Invoices::findOrFail($request->id);
        $destinationPath = public_path('files/'.$invoice->invoice_number);
        File::deleteDirectory($destinationPath);
        $invoice->forceDelete();
        return response()->json(['message'=>'تم حذف الفاتورة بنجاح','status'=>true],200);

    }


    public function archive(Request $request)
    {
        $invoice= Invoices::findOrFail($request->id);
        $invoice->delete();
        return response()->json(['message'=>'تم نقل الفاتورة الى الارشيف بنجاح','status'=>true],200);
    }



    public function status(Request $request)
    {
        $invoice= Invoices::findOrFail($request->id);
        if ($invoice->Value_Status==1) {
            $invoice->update(['Status'=>'غير مدفوعة','Value_Status'=>2,'Payment_Date'=>null]);

        }else{
            $invoice->update(['Status'=>' مدفوعة','Value_Status'=>1,'Payment_Date'=>date("Y/m/d H:i:s")]);
        }
        return response()->json(['message'=>'تم  تغيير حالة الدفع  بنجاح','status'=>true],200);
    }


    public function indexArchive()
    {
        $invoices=Invoices::onlyTrashed()->get();
        return view('invoices.archive',compact('invoices'));
    }


    public function unarchive(Request $request)
    {
        Invoices::withTrashed()->find($request->id)->restore();
        return response()->json(['message'=>'تم  الغاء الارشفة بنجاح','status'=>true],200);
    }

    public function print($id){
        $invoice=Invoices::withTrashed()->find($id);
        return view('invoices.print',compact('invoice'));
    }



    public function excel(){

        return Excel::download(new InvoicesExport(), 'invoices.xlsx');
    }



    public function getProducts($id){
        $product = Product::wheresection_id($id)->pluck('product_name','id');
        return json_encode($product);
    }

}

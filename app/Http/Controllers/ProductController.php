<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditSectionsRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\SectionsRequest;
use App\Product;
use App\Sections;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function __construct()
    {
        $this->middleware('permission:read_products')->only(['index']);
        $this->middleware('permission:create_products')->only(['store']);
        $this->middleware('permission:update_products')->only(['update']);
        $this->middleware('permission:delete_products')->only(['destroy']);

    }

    public function index()
    {
        $products=Product::all();
        $sections=Sections::all();
        return view('products.all',compact('products','sections'));
    }


    public function store(ProductRequest $request)
    {
        Product::create($request->all());

      return redirect()->back()->with(['message' => 'تمت الاضافة بنجاح', 'alert-type' => 'success']);
    }


    public function update(ProductRequest $request)
    {
       $product= Product::find($request->id);
        $product->update($request->all());
        return redirect()->back()->with(['message' => 'تم تعديل المنتج بنجاح', 'alert-type' => 'success']);

    }


    public function destroy(Request $request)
    {
        $product= Product::findOrFail($request->id);
        $product->delete();
        return response()->json(['message'=>'تم حذف المنتج بنجاح','status'=>true],200);
    }
}

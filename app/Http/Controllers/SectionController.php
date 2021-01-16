<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditSectionsRequest;
use App\Http\Requests\SectionsRequest;
use App\Sections;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_sections')->only(['index']);
        $this->middleware('permission:create_sections')->only(['store']);
        $this->middleware('permission:update_sections')->only(['update']);
        $this->middleware('permission:delete_sections')->only(['destroy']);

    }

    public function index()
    {
        $sections=Sections::all();
        return view('sections.all',compact('sections'));
    }


    public function store(SectionsRequest $request)
    {
        Sections::create(['Created_by'=>auth()->user()->name]+$request->all());

      return redirect()->back()->with(['message' => 'تمت الاضافة بنجاح', 'alert-type' => 'success']);;
    }


    public function update(EditSectionsRequest $request)
    {
       $section= Sections::find($request->id);
       $section->update($request->all());
        return redirect()->back()->with(['message' => 'تم    التعديل بنجاح', 'alert-type' => 'success']);

    }

    public function destroy(Request $request)
    {
        $section= Sections::findOrFail($request->id);
        $section->delete();
        return response()->json(['message'=>'تم حذف القسم بنجاح','status'=>true],200);
    }
}

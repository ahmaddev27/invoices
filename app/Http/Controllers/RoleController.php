<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller{



    public function __construct()
    {
        $this->middleware('permission:read_roles')->only(['index']);
        $this->middleware('permission:create_roles')->only(['create','store']);
        $this->middleware('permission:update_roles')->only(['edit','update']);
        $this->middleware('permission:delete_roles')->only(['destroy']);

    }



    public function index()

    {
        $roles =Role::whereRoleNot(['1'])
            ->with('permissions')
            ->withCount('users')->get();
        return view('roles.all',compact('roles'));
    }


    public function create()
    {
        return view('roles.add');
    }


    public function store(RoleRequest $request)
    {
        $role = Role::create($request->all());
        $role->attachPermissions($request->permissions);
        return redirect()->route('roles.index')
            ->with(['message' => 'تمت الاضافة بنجاح', 'alert-type' => 'success']);

    }



    public function edit($id)
    {
        $role=Role::find($id);
        return  view('roles.edit',compact('role'));
    }


    public function update(Request $request,$id)
    {
        $Role=Role::findorFail($id);
        $Role->update($request->all());
        $Role->syncPermissions($request->permissions);
        return redirect()->route('roles.index')
            ->with(['message' => 'تمت تعديل الصلاحية بنجاح ', 'alert-type' => 'success']);
    }


    public function destroy(Request $request )
    {
        $role= Role::findOrFail($request->id);
        $role->delete();
        return response()->json(['message'=>'تم حذف الصلاحية بنجاح','status'=>true],200);

    }
}

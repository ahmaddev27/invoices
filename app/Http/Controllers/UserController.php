<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUsersRequest;
use App\Http\Requests\UsersRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_users')->only(['index']);
        $this->middleware('permission:create_users')->only(['create','store']);
        $this->middleware('permission:update_users')->only(['edit','update']);
        $this->middleware('permission:delete_users')->only(['destroy']);


    }

    public function index(){

        $users=User::WhereRoleNot(['1'])->get();
        return view('users.all',compact('users'));
    }



    public function create(){
        $roles=Role::whereRoleNot(['1'])->get();
        return view('users.add',compact('roles'));
    }

    public function store(UsersRequest $request){

        $request->merge(['password'=>bcrypt($request->password)]);
        $User = User::create($request->all());
        $User->attachRoles([$request->role]);
        return redirect()->route('users.index')
            ->with(['message' => 'تم الاضافة بنجاح بنجاح', 'alert-type' => 'success']);

    }


    public function edit($id)

    {
        $user=User::find($id);
        $roles=Role::whereRoleNot(['1'])->get();
        return view('users.edit', compact('user','roles'));
    }



    public function update(EditUsersRequest $request, $id)
    {
        if ($request->password=='') {
            $User=User::find($id);
            $User->update($request->except('password'));
        }else {

            $User=User::find($id);
            $request->merge(['password'=>bcrypt($request->password)]);
            $User->update($request->all());
        }


        $User->syncRoles([$request->role]);
        return redirect()->route('users.index')
            ->with(['message' => 'تم تعديل المستخدم بنجاح', 'alert-type' => 'success']);

    }



    public function destroy(Request $request )
    {
        $user= User::findOrFail($request->id);
        $user->delete();
        return response()->json(['message'=>'تم حذف المستخدم بنجاح','status'=>true],200);

    }

}

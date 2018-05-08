<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Role;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(4);
        return view('admin.roles.index', compact('roles'));
    }
    // 创建角色
    public function addRole(Request $request){
        $rules = array(
            'name' => 'required',
            'guard_name' => 'required',
        );
        $validator = Validator::make ( Input::all(), $rules);
        if ($validator->fails()){
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        }else {
            $role = new Role;
            $role->name = $request->name;
            $role->guard_name = $request->guard_name;
            $role->save();
            return response()->json($role);
        }
    }
    // 删除角色信息
    public function deleteRole(request $request){
        $role = Role::where('id', $request->id)->delete();
        return response()->json();
    }
    // 编辑角色信息
    public function editRole(request $request){
        $role = Role::find ($request->id);
        $role->name = $request->name;
        $role->guard_name = $request->guard_name;
        $role->save();
        return response()->json($role);
    }
}

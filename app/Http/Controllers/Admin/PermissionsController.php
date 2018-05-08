<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Permission;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
class PermissionsController extends Controller
{
    public function index()
    {
        $permissions = Permission::paginate(4);
        return view('admin.permissions.index', compact('permissions'));
    }
    // 创建角色
    public function addPermission(Request $request){
        $rules = array(
            'name' => 'required',
            'guard_name' => 'required',
        );
        $validator = Validator::make ( Input::all(), $rules);
        if ($validator->fails()){
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        }else {
            $permission = new Permission;
            $permission->name = $request->name;
            $permission->guard_name = $request->guard_name;
            $permission->save();
            return response()->json($permission);
        }
    }
    // 删除角色信息
    public function deletePermission(request $request){
        $permission = Permission::where('id', $request->id)->delete();
        return response()->json();
    }
    // 编辑角色信息
    public function editPermission(request $request){
        $permission = Permission::find ($request->id);
        $permission->name = $request->name;
        $permission->guard_name = $request->guard_name;
        $permission->save();
        return response()->json($permission);
    }
}

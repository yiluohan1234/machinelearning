<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(4);
        return view('admin.users.index', compact('users'));
    }
    // 创建用户
    public function addUser(Request $request){
        $rules = array(
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        );
        $validator = Validator::make ( Input::all(), $rules);
        if ($validator->fails()){
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        }else {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json($user);
        }
    }
    // 删除用户信息
    public function deleteUser(request $request){
        $user = User::where('id', $request->id)->delete();
        return response()->json();
    }
    // 编辑用户信息
    public function editUser(request $request){
        $user = User::find ($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return response()->json($user);
    }
}

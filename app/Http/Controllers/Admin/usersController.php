<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class usersController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function edit($user_id){
        $users = User::find($user_id);
        return view('admin.user.edit', compact('users'));
    }

    public function update(Request $request, $user_id){

        $users = User::find($user_id);
        if($users){
            $users->name = $request->name;
            $users->email = $request->email;
            $users->phone = $request->phone;
            $users->address = $request->address;
            $users->role_as = $request->role_as;

            $users->update();
        }
        return redirect('admin/users')->with('message' , 'user updated');
    }

    public function delete($user_id){
        $users = User::find($user_id);
        if($user_id){
            $users->delete();
            return redirect('admin/users')->with('message' , 'User Deleted');
        }else{
            return redirect('admin/users')->with('message' , 'ID Not Found');
        }


    }

    
}

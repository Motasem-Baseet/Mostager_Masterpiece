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
        $data = $request->validated();
        $users = User::find($user_id);

        $users->name = $data['name'];
        $users->name = $data['email'];

        $users->update();

        return redirect('admin/users')->with('message' , 'user updated');


    }
}

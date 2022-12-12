<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Http\Resources\userResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return User::all();
    }

    public function show($id){
        return User::find($id);
    }

    public function store(UserCreateRequest $request){
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make(1234);
        if($user->save()){
            return new userResource($user);
        }
    }

    public function update(UserUpdateRequest $request, $id){
        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        if($user->save()){
            return new userResource($user);
        }
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        if($user->delete()){
            return new userResource($user);
        }
    }
}

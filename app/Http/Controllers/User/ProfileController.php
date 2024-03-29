<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    public function update_profile(Request $request,User $user)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|unique:users,email,'.$user->id,
            'phone' => 'numeric|min:10|nullable',
            'address' => 'nullable'
        ]);

        if($validator->fails()){
            return redirect('profile')
                   ->withErrors($validator)
                   ->withInput();
        }else{
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->save();

            return redirect('profile')->with('message',['text' => 'Profile updated!', 'class' => 'success']);
        }
    }

    public function update_password(Request $request, User $user)
    {
        $validator = Validator::make($request->all(),[
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required'
        ]);

        if($validator->fails()){
            return redirect('profile')
                   ->withErrors($validator)
                   ->withInput();
        }else{
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect('profile')->with('message',['text' => 'Password updated!', 'class' => 'success']);
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('login'));
    }
}

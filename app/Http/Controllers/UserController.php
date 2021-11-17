<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index(){
        $pagetitle = "user";
        $no = 1;
        $datauser = User::orderBy('id','desc')->get();
        return view('administrator.user', compact('pagetitle', 'datauser', 'no'));
    }

    public function add(Request $request){
        $user = new User;

        $user->name         = $request->nama;
        $user->email        = $request->email;
        $user->password     = Hash::make($request->password);
        $user->role         = $request->role;
        $user->save();

        toast('Data berhasil ditambahkan',  'success');
        return redirect('/user');
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();

        return redirect('/user');
    }
}

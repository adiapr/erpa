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

        toast('Data telah dihapus',  'warning');
        return redirect('/user');
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $user->name     = $request->nama;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);
        $user->role     = $request->role;
        $user->update();

        toast('Data berhasil diperbaharui',  'success');
        return redirect('/user');
    }

    public function profile(){
        return view('data.profile');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Image;
use File;

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

    // profile
    public function profile(){
        return view('data.profile');
    }

    public function update_profile(Request $request, $id){
        $user = User::find($id);

        if($user->password != $request->has('password')){
            toast('Password Salah',  'warning');
            return redirect('/user/profile');
        }

        if($request->has('foto')){
            $this->validate($request, [
                'foto'=>'image|mimes:jpeg,jpg,png'
            ]);

            $user->name     = $request->nama;
            $user->email    = $request->email;
            $user->password = Hash::make($request->password);
            $user->role     = $request->role;

            $foto = $request->foto;
            $namafile = time().'.'.$foto->getClientOriginalExtension();

            Image::make($foto)->resize(400,400)
            ->save('profil/thumb/'.$namafile); 

            $foto->move('profil/'.$namafile);
            $user->foto     = $namafile;
        }else{
            $user->name     = $request->nama;
            $user->email    = $request->email;
            $user->password = Hash::make($request->password);
            $user->role     = $request->role;

        }



        $user->update();
        toast('Profil Diperbaharui',  'success');
        return redirect('/user/profile');

    }
}

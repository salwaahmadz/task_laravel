<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShareFormRequest;
use Illuminate\Http\Request;
use App\upload;
use DB;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\ModelUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Encryption\DecryptException;

class AdminController extends Controller
{
    /*INDEX MAPPING & RETRACE*/
    public function index()
    {
        $files = upload::all();
        if(!Session::get('login')){
            return redirect('login')->with('gagal', 'Anda Harus Login Terlebih Dahulu');
        }
        else{
           return view('admin.mapping')->with('files', $files);
       }
   }

   /*AKHIR INDEX*/

   /*FUNGSI CRUD*/
   public function upload(ShareFormRequest $request)
   {
    $upload = "N";
    if($request->hasFile('file'))
    {
        $destination = "upload";
        $file = $request->file('file');
        $file->move($destination, $file->getClientOriginalName());
        $upload = "Y";
    }

    if ($upload=="Y") {
        $upload = new upload;
        $upload->version = $request->version;
        $upload->file_name = $file->getClientOriginalName();
        $upload->save();
    }
    return redirect('admin')->with('sukses', "Data berhasil ditambahkan");
}

public function edit($id_upload)
{
    $upload = \App\upload::find($id_upload);
    return view('admin/edit', ['upload'=>$upload]);
}

public function update(ShareFormRequest $request, $id_upload)
{
    $upload = upload::find($id_upload);

    if($request->file) {
        $path  = public_path('upload/').$upload->file_name;
        $destination = "upload";
        $file = $request->file('file');
        $file->move($destination, $file->getClientOriginalName());
            //update file to database
        $upload->file_name = $file->getClientOriginalName();
        $upload->version = $request->version;
        $upload->save();  

        Storage::delete($path);
        File::delete($path);  
    } else {
        return back();
    }
    return redirect('admin')->with('sukses', "Data berhasil diperbaharui");

}

public function delete($id_upload)
{
    $upload = upload::find($id_upload);
    $path = public_path('upload/').$upload->file_name;

    Storage::delete($path);
    File::delete($path);
            // $file = Storage::files('upload');
    $upload->delete();
    return redirect('admin')->with('sukses', "Data berhasil dihapus");
}

public function download()
{
    $files = DB::table('upload.upload')->get();
    return view('admin.mapping', compact('files'));
}
/*AKHIR FUNGSI CRUD*/

/*FUNGSI LOGIN*/
public function login()
{
    return view('login');
}

public function loginPost(Request $request)
{
    $files = upload::all();
    $email = $request->email;
    $password = $request->password;
    $data = ModelUser::where('email', $email)->first();
            //dd($data);
    if($data){
        if(Hash::check($password,   $data->password)){
            Session::put('name',    $data->name);
            Session::put('email',   $data->email);
            Session::put('login',   TRUE);
            return view('admin.mapping')->with('files',$files);
        }else{
            return redirect('login')->with('gagal', "Email atau Password yang anda masukan salah");
        }
    }else{
        return redirect('login')->with('gagal', "Email atau Password yang anda masukan salah");
    }       
}

public function logout()
{
    Session::flush();
    return redirect ('login')->with('gagal', "Anda telah Log Out! Silahkan Login kembali");
}

public function register()
{
    return view('register');
}

public function registerPost(request $request)
{
    $this->validate($request, [
        'name' => 'required|min:4',
        'email' => 'required|min:4|email|unique:users',
        'password' => 'required',
        'confirmation' => 'required|same:password',
    ]);

    $data =  new ModelUser();
    $data->name = $request->name;
    $data->email = $request->email;
    $data->password = bcrypt($request->password);
    $data->save();
    return redirect('login')->with('sukses','Kamu berhasil Register');
}
/*AKHIR FUNGSI LOGIN*/

/*Retrace*/

public function retrace(Request $request){
    $data = [
        'version' => $request->version,
        'input' => $request->input
    ];
    $uploads = upload::orderBy('version', 'asc')->get();
    // dd($data);
    return view('admin.retrace', compact('uploads','data'));
    // return view('admin.retrace', compact('uploads'));
    }

public function process(Request $request){
    echo ("here");
   }
}
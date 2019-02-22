<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShareFormRequest;
use Illuminate\Http\Request;
use App\upload;
use DB;
use File;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
    	$data["files"] = upload::all();
    	return view('admin.mapping', $data);
    }

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

    }

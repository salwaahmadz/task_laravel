<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShareFormRequest;
use Illuminate\Http\Request;
use App\upload;

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
        if($request->hasFile('filename'))
        {
            $destination = "upload";
            $filename = $request->file('filename');
            $filename->move($destination, $filename->getClientOriginalName());
            $upload = "Y";
        }

        if ($upload=="Y") {
            $upload = new upload;
            $upload->version = $request->version;
            $upload->filename = $filename->getClientOriginalName();
            $upload->save();
        }

            // \App\upload::create($request->all());

    	     return redirect('admin')->with('sukses', "Data berhasil ditambahkan");
        }
    }

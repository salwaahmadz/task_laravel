@extends('layouts.master')

@section('content')

@if(session('sukses'))
<div class="alert alert-success" role="alert">
 {{session('sukses')}}
</div>
@endif

@if (count($errors) > 0)
@foreach ($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach
@endif

<section class="content-header">
  <h1><center>Update Data</center></h1>
</section>
<section class="content">
<div class="row">
		<div class="col-sm-6">
		<form action="/admin/{{$upload->id_upload}}/update" method="POST" enctype="multipart/form-data">
				      	{{csrf_field()}}
			  <div class="form-group">
           <label for="exampleInputEmail1">Upload New File</label>
           <input name="file" type="File" id="exampleInputEmail1" aria-describedby="emailHelp">
         </div>

         <div class="form-group">
           <label for="filenames">Old File Name</label>
           <h5>{{$upload->file_name}}</h5>
         </div>

			  <div class="form-group">
           <label for="versions">Version Number</label>
           <input name = "version" type="text" class="form-control" id="versions" aria-describedby="emailHelp" placeholder="Version Number" value="{{$upload->version}}">
         </div>
			
  			 	<button type="submit" class="btn btn-warning">Update</button>
			</form>
		</div>
	</div>
</section>

@endsection
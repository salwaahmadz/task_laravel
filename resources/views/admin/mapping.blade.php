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
  <h1><center>Mapping Files</center></h1>
</section>

<!-- Main Content -->
<section class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Manage</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tr>	
              <th style="text-align:center;">Version</th>
              <th style="text-align:center;">File Name</th>
              <th style="text-align:center;">Operation</th>
              <th style="text-align:center;">Created At</th>
              <th style="text-align:center;">Updated At</th>
            </tr>
            @foreach($files as $file)
            <tr>
              <td>{{$file["version"]}}</td>
              <td>{{$file["filename"]}}</td>
              <td style="text-align:center;">
               <a href="#" class="btn btn-primary btn-sm">Download</a>
               <a href="#" class="btn btn-warning btn-sm">Update</a>
               <a href="#" class="btn btn-danger btn-sm">Delete</a>
             </td>
             <td>{{$file["created_at"]}}</td>
             <td>{{$file["updated_at"]}}</td>
           </tr>
           @endforeach
         </table>
         <!-- Modal Button Trigger -->
         <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" style="margin-top: 10px; float: right;">
         Insert Data</button>
         <!-- End Modal Trigger -->
       </div>
     </div>
   </div>
 </section>
 <!-- End Main Content -->

 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Add File Mapping</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">	

       <form action="{{ route('admin.upload') }}" method="POST" enctype="multipart/form-data">
         {{csrf_field()}}
         <div class="form-group">
           <label for="exampleInputEmail1">Upload File</label>
           <input name="filename" type="File" id="exampleInputEmail1" aria-describedby="emailHelp">
         </div>
         
         <div class="form-group">
           <label for="versions">Version Number</label>
           <input name = "version" type="text" class="form-control" id="versions" aria-describedby="emailHelp" placeholder="Version Number">
         </div>
       </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Upload</button>
      </form>
    </div>
  </div>
</div>
</div>
<!-- End Modal -->
@endsection
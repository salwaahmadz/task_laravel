@extends('layouts.master')

@section('content')

@if(session('sukses'))
<div class="alert alert-success" role="alert">
 {{session('sukses')}}
</div>
@endif

@if(session('gagal'))
<div class="alert alert-danger" role="alert">
 {{session('gagal')}}
</div>
@endif

@if (count($errors) > 0)
@foreach ($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach
@endif

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/asset/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Session::get('name')}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview active">
          <ul class="treeview-menu">
            <li class="active"><a href="admin.mapping"><i class="fa fa-circle-o"></i>Mapping</a></li>
            <li><a href="{{ route('admin.retrace') }}"><i class="fa fa-circle-o"></i>Retrace</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>


<section class="content-header">
  <h1><center>Mapping Files</center></h1>
        <!-- Modal Button Trigger -->
         <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#exampleModal" style="margin-bottom: 10px; float: right;">
         Insert Data</button>
         <!-- End Modal Trigger -->
</section>

<!-- Main Content -->
<section class="content">
  <div class="row">
    <div class="col-sm-12">
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
              <td>{{$file["file_name"]}}</td>
              <td style="text-align:center;">
               <a href="upload/{{$file->file_name}}" class="btn btn-primary btn-sm" download="{{$file->file_name}}">Download</a>
               <a href="/admin/{{$file->id_upload}}/edit" class="btn btn-warning btn-sm">Update</a>
               <a href="/admin/{{$file->id_upload}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')">Delete</a>
             </td>
             <td>{{$file["created_at"]}}</td>
             <td>{{$file["updated_at"]}}</td>
           </tr>
           @endforeach
         </table>
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
           <input name="file" type="File" id="exampleInputEmail1" aria-describedby="emailHelp">
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
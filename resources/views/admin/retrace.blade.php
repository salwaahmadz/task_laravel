@extends('layouts.master')
@section('content')
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
            <li><a href="/admin"><i class="fa fa-circle-o"></i>Mapping</a></li>
            <li class="active"><a href="{{ route('admin.retrace') }}"><i class="fa fa-circle-o"></i>Retrace</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Header -->
  <section class="content-header">
  <h1><center>Retrace File</center></h1>
  </section>

  <section style="margin-left: 20px;">
  	<h4>Please select the version number</h4>

 <form action="{{ route('admin.retrace' )}}" method="get">
    {{csrf_field()}}

  <select class="custom-select" style="width: 100px; height: 30px; font-size: 20px;" name="version">
  	@foreach ($uploads as $upload)
  <option value="{{ $upload->version }}">{{$upload->version}}</option>
  	@endforeach
  </select>
  </section>
  <!-- End Header -->


  <!-- Main Content -->
  <h4 style="text-align: center;">Please insert the fuscate text</h4>
  <textarea style="width: 80%; height: 250px; margin-left: 20px;" name="input">{{\Request::get('input')}}</textarea>
  <br>
  <br>
  <button class="btn btn-primary btn-md" style="margin-left: 20px; margin-bottom: 5%">Process</button>
  <br>
  </form>

  <h4 style="text-align: center;">Result</h4>
  <textarea style="width: 80%; height: 250px; margin-left: 20px;">
    {{$data['input']}}
  </textarea>
  
  <!-- <br>
  <h4 style="text-align: center;">Result</h4>
  <textarea style="width: 80%; height: 250px; margin-left: 20px;">
  
  </textarea> -->
@endsection
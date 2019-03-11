@extends('layouts.master')
@section('content')

@if(session('sukses'))
<div class="alert alert-success" role="alert">
 {{session('sukses')}}
</div>
@endif

<meta name="csrf-token" content="{{csrf_token()}}"/>
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


<!-- Form  -->
<form action="/admin/retrace/process" method="post">
  {{csrf_field()}}
<section style="margin-left: 20px;">
 <h4>Please select the version number</h4>

  <select class="custom-select" style="width: 100px; height: 30px; font-size: 20px;" name="version" id="version">
  	@foreach ($uploads as $upload)
     @if($upload->id_upload == $data['version']) 
     <option value="{{ $upload->id_upload }}" selected>{{$upload->version}}</option>
     @else
     <option value="{{ $upload->id_upload }}">{{$upload->version}}</option>
     @endif
    @endforeach
  </select>
</section>
<!-- End Header -->



<!-- Main Content -->
<h4 style="text-align: center;">Please insert the obfuscate text</h4>
<textarea style="width: 80%; height: 250px; margin-left: 20px;" name="input" id="input">{{\Request::get('input')}}</textarea>
<br>
<br>
<button class="btn btn-primary btn-md" style="margin-left: 20px; margin-bottom: 5%" id="processx">Process</button>
<br>


<h4 style="text-align: center;">Result</h4>
<textarea style="width: 80%; height: 250px; margin-left: 20px;" id="result">
  {{$data['result']}}
</textarea>
</form>

<!-- <script type="text/javascript" src="/asset/js/jquery.js"></script> -->
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  $.ajaxSetup({
      headers:{
          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
  });

  $(document).ready(function(){
    $('#process').click(function(){
        var ver = $('#version').val();
        var inp = $('#input').val();
        var dataString = "version "+ ver+" & input "+inp;
        // console.log(dataString);
        // alert(dataString);
        $.ajax({
            type  : "POST",
            url   : "/admin/retrace/process",
            data  : dataString,
            succes:function(data){
                console.log(data);
                $('#result').html(data);
            }
        });
    });

  });
</script> -->
  <!-- <br>
  <h4 style="text-align: center;">Result</h4>
  <textarea style="width: 80%; height: 250px; margin-left: 20px;">
  
  </textarea> -->
  @endsection
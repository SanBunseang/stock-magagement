@extends('admin\dasboard')
@section('title')
    <title>Staff</title>
@stop
{{-- user click home navbar --}}


@section('contentHeader')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Employee</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Staff</a></li>
            <li class="breadcrumb-item active">Employee</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@stop

@section('content')
 <div class="row">
    <div class="col-md-12 col">
        <div class="card text-bold">
            <div class="card-header">
                <strong>Detail employee informations</strong>
            </div>
            <div class="card-body row">
               <div class="col-md-4 col-4">
                    Id: <strong>{{$staff-> id}}</strong><br/>
                    Name: <strong>{{$staff-> Name}}</strong><br/>
                    Gender: <strong>{{$staff-> Gender}}</strong><br/>
                    Date of birth: <strong>{{$staff-> DOB }}</strong><br/>
                    Position: <strong>{{$staff-> Position}}</strong><br/>
                    Address: <strong>{{$staff-> Address}}</strong><br/>
                </div>
                <div class="col-md-4 col-4">
                    Phone: <strong>{{$staff-> Phone}}</strong><br/>
                    E-mail: <strong>{{$staff-> Email}}</strong><br/>
                    Hired Date: <strong>{{$staff-> HiredDate}}</strong><br/>
                    Salary: <strong>{{$staff-> Salary}}</strong><br/>
                    Situation: <strong>{{$staff-> Status}}</strong><br/>
                </div>     
                <div class="col-md-4 col-4" >
                  <img src="{{asset('dist/img/' . $staff->Image) }}"alt="Image" width="100px;"/>
                </div>     
            </div>
            <div class="card-footer">
                <a href="{{url('staff')}}">
                    <i class="fa fa-fast-backward"> Back</i>
                </a>
            </div>
        </div>
    </div>
 </div>
</section>  
@stop  
@section('style')
  <script>
  
  </script>
  <style>
    *,
    *:before,
    *:after {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    }

    body {
    margin: 0;
    font: 14px "PT Sans", Arial, sans-serif;
    color: #5a5a5a;
    }
   
  </style>
@stop

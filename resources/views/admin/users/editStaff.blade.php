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
    <form action="{{url('/updateStaff',$staff->id)}}" enctype="multipart/form-data"method="POST">
            @csrf
            @method('PUT')
            <div class="card text-bold">
                <div class="card-header">
                    <h4>Edit Employee</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 text-left">
                          <div class="form-group">
                            <label for="uname">Name:</label>
                          <input type="text" class="form-control" id="name" placeholder="Enter Full_Name" name="name"  value="{{$staff->Name}}"required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                          </div>
                          <div class="form-group ">
                            <div class="col-md-6 form-check-inline">
                              <div class="form-check">
                                <input type="radio" id="gender"name="gender" value="Male" checked> Male
                              </div>
                              <div class="form-check">
                                <input type="radio" id="gender"name="gender" value="Female"> Female   
                              </div>          
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-6">  
                              <label for="dob">Date Of Birth:</label>
                              <input type="date" class="form-control" id="dob" placeholder="Enter date of birth" name="dob" value="{{$staff->DOB}}" required>
                              <div class="valid-feedback">Valid.</div>
                              <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="phone">Phone:</label>
                              <input type="phone" class="form-control" id="phone" placeholder="Enter phone number" name="phone"value="{{$staff->Phone}}" required>
                              <div class="valid-feedback">Valid.</div>
                              <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                          </div>
                          <div class="form-group form-inline">
                            <label for="mail">E-mail:</label>
                            <div class="col-md-6">
                              <input type="email" class="form-control " id="mail" placeholder="Enter E-mail" name="mail" value="{{$staff->Email}}"required>
                              <div class="valid-feedback">Valid.</div>
                              <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                          
                          </div>
                          <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea class="form-control" rows="4" cols="50" name="address" id="address"required>{{$staff->Address}}</textarea>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                          </div>
                       </div> 
                       <div class="col-md-6  text-left">   
                        <div class="form-group ">
                          
                          <label for="image">Select file to Upload:</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" >Upload</span>
                            </div>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="image" name="image"value="{{$staff->Image}}"
                                aria-describedby="image" >
                              <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="hiredDate">Hired Date:</label>
                          <input type="date" class="form-control" id="hideDate" placeholder="Enter Hired date" name="hiredDate" value="{{$staff->HiredDate}}" required>
                          <div class="valid-feedback">Valid.</div>
                          <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6">
                            <label for="position">Position:</label>
                            <input type="text" class="form-control" id="pos" placeholder="Enter Position" name="pos"value="{{$staff->Position}}" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="salary">Salary:</label>
                            <input type="text" class="form-control" id="salary" placeholder="Enter Position" name="salary" value="{{$staff->Salary}}"required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                          </div>
                        </div>
                        <div class="form-check text-right">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="status"checked="checked" name="status" value="1">Stop work
                          </label>
                        </div>
                      </div>
                    </div>    
                </div>
                <div class="card-footer row">
                    <div class="col-md-6">
                      <button type="submit" class="btn btn-sm btn-primary">Save</button>
                    </div>
                    <div class="col-md-6 text-right">
                      <a href="{{url('staff')}}">Back</a>
                    </div>
                </div>
            </div>
        </form>
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
   
    #image1 {
        width: 96%;
        padding: 2%;
        border: 1px dashed green;
    }
    
    #header {
        background: #405570;
        color: white;
        text-align: center;
        padding: 2%;
    }
    
    #view-image {
        border-radius: 5px;
        overflow: hidden;
    }
    
    #preview-image {
        padding: 1%;
        border: 1px solid #efefef;
        height: 200px;
    }
  </style>
@stop
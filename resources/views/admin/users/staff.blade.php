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
            <li class="breadcrumb-item"><a href="{{url('/staff')}}">Staff</a></li>
            <li class="breadcrumb-item active">Employee</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@stop

@section('content')
 <!-- Main content -->
 <section class="content">
      <div class="card">
        <div class="card-header row">
          <div class="col-md-7 col-12">
            <div class="col-md-5 ">
              <h3 class="card-title ">Employee informations</h3>
            </div>
            <div class="col-md-7 col- text-right">
              <select class="currentStaff" >
                <option value="1">Current employees</option>
                <option value="2">All employees</option>
              </select> 
            </div>
          </div>
          <div class="col-md-5 col-12 text-right ">
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add">Add</button>
          </div>
        </div>
        <div class="card-body">
            <table id="tbstaffs" class="table table-hover" width="100%">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Gender</th>
                      <th>Birthay</th>
                      <th>Position</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>HiredDate</th>
                      <th>Salary</th>
                      <th>status</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                <script> 
                if($(".currentStaff").val()==1){
                  var url="{{ route('getCurrentStaff') }}";
                }else {
                  var url="{{ route('getstaff') }}";
                }
                $('#tbstaffs').DataTable({
                              "serverSide": true,
                              "ajax": {
                                  headers: {
                                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                  },
                                  "url":url,
                                  "dataType": "json",
                                  "type": "POST"
                              },
                              "columns": [
                                  {"data": "id","orderable": false, },
                                  { "data": "Name" },
                                  { "data": "Gender" },
                                  { "data": "DOB" },
                                  { "data": "Position" },
                                  { "data": "Address" },
                                  { "data": "Phone" },
                                  { "data": "Email" },
                                  { "data": "Salary" },
                                  { "data": "HiredDate" },
                                  { "data": "Status" },
                                  {
                                    "data": "id",
                                    render: function(data, type, row) {
                                      return '<a href=/editStaff/' +row.id+ '>' + '<i class=" fa fa-edit"></i> ' + '</a>&nbsp&nbsp'+
                                      '<a href=/showStaff/' +data+ '>' + '<i class="fas fa-eye"></i>' + '</a>&nbsp&nbsp'+
                                      '<a data-id="'+data+'"data-toggle="modal" data-target="#delete"class="remove">' + '<i class="fa fa-trash text-danger"></i>' + '</a>';
                                    }
                                  }
                              ]
                          });
                $(document).ready(function() {
                  $(".remove").click(function(){
                    var id = $(this).attr("data-id");
                    $('#changestate').val('stoped');
                    var submitUrl = '/changeStatus/' +id;
                    form = $('#removeModal');
                    form.attr('action', submitUrl);
                  });
                });
               
              </script>
            </tbody>
          </table>
        </div>  
      </div>

  {{-- model_insert --}}
  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-fluid modal-lg " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalPreviewLabel">Add Employee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="container">
              <form action="{{url('/staff/insertStaff')}}" class="needs-validation"method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="row">
                  <div class="col-md-6 text-left">
                    <div class="form-group">
                      <label for="uname">Name:</label>
                      <input type="text" class="form-control" id="name" placeholder="Enter Full_Name" name="name" required>
                      <div class="valid-feedback">Valid.</div>
                      <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group ">
                      <div class="col-md-6 form-check-inline">
                        <div class="form-check">
                          <input type="radio" id="gender"name="gender" value="male" checked> Male
                        </div>
                        <div class="form-check">
                          <input type="radio" id="gender"name="gender" value="female"> Female   
                        </div>          
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">  
                        <label for="dob">Date Of Birth:</label>
                        <input type="date" class="form-control" id="bod" placeholder="Enter date of birth" name="bod" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="phone">Phone:</label>
                        <input type="phone" class="form-control" id="phone" placeholder="Enter phone number" name="phone" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                      </div>
                    </div>
                    <div class="form-group form-inline">
                      <label for="mail">E-mail:</label>
                      <div class="col-md-6">
                        <input type="email" class="form-control " id="mail" placeholder="Enter E-mail" name="mail" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                      </div>
                    
                    </div>
                    <div class="form-group">
                      <label for="address">Address:</label>
                      <textarea class="form-control" rows="4" cols="50" name="address" id="address"required></textarea>
                      <div class="valid-feedback">Valid.</div>
                      <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                 </div> 
                 <div class="col-md-6  text-left">   
                  <div class="form-group">
                    <label for="image">Select file to Upload:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" >Upload</span>
                      </div>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image"
                          aria-describedby="image" >
                        <label class="custom-file-label" for="image">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="hiredDate">Hired Date:</label>
                    <input type="date" class="form-control" id="hideDate" placeholder="Enter Hired date" name="hiredDate" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="position">Position:</label>
                      <input type="text" class="form-control" id="pos" placeholder="Enter Position" name="pos" required>
                      <div class="valid-feedback">Valid.</div>
                      <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="salary">Salary:</label>
                      <input type="text" class="form-control" id="salary" placeholder="Enter Position" name="salary" required>
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
                <div class=" modal-footer ">
                  <button type="submit" class="btn btn-primary btn-sm">Save</button>
                  <button type="button" class="btn btn-secondary btn-sm  pull-left" data-dismiss="modal">Close</button>
                </div>
              </form>  
          </div>
        </div>
        {{-- <div class=" modal-footer ">
          <button type="submit" class="btn btn-primary btn-sm">Save</button>
          <button type="button" class="btn btn-secondary btn-sm  pull-left" data-dismiss="modal">Close</button>
        </div> --}}
      </div>
    </div>
  </div>
  <!-- Modal -->

{{-- model_delete --}}
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-fluid modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalPreviewLabel">Delete Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row ">
          <div class="col-md-12 col">
          <form id="removeModal" action="" method="POST">
                  @csrf
                  @method('DELETE')
                  <div class="card text-bold">
                      <div class="card-header">
                          <strong>DELETE ?</strong>
                      </div>
                      <div class="card-body">
                          <div class="alert alert-warning" role="alert">
                            <input type="hidden" name="changestate"id="changestate" value="">
                            <strong>Do you want to delete this record ?</strong>
                          </div>
                      </div>
                      <div class="card-footer">
                          <button type="submit" class="btn btn-sm btn-primary">Delete</button>
                          &nbsp; &nbsp;
                          <button type="button" class="btn btn-secondary btn-sm  pull-left" data-dismiss="modal">Cencel</button>
                      </div>
                  </div>
              </form>
          </div>
        </div>
      </div>
      {{-- <div class=" modal-footer ">
        <button type="submit" class="btn btn-primary btn-sm">Save</button>
        <button type="button" class="btn btn-secondary btn-sm  pull-left" data-dismiss="modal">Close</button>
      </div> --}}
    </div>
  </div>
</div>
<!-- Modal -->

</section>
<!-- /.content -->
</section>  
@stop  
@section('style')
  <script>
     
    // Disable form submissions if there are invalid fields
    
    // (function() {
    //   'use strict';
    //   window.addEventListener('load', function() {
    //     // Get the forms we want to add validation styles to
    //     var forms = document.getElementsByClassName('needs-validation');
    //     // Loop over them and prevent submission
    //     var validation = Array.prototype.filter.call(forms, function(form) {
    //       form.addEventListener('submit', function(event) {
    //         if (form.checkValidity() === false) {
    //           event.preventDefault();
    //           event.stopPropagation();
    //         }
    //         form.classList.add('was-validated');
    //       }, false);
    //     });
    //   }, false);
    // })();
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
@extends('admin\dasboard')
@section('title')
    <title>User</title>
@stop
{{-- user click home navbar --}}

@section('contentHeader')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Staff</a></li>
            <li class="breadcrumb-item active">User</li>
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
        <div class="card-header">
          <h3 class="card-title">User informations</h3>
        </div>
        <div class="card-body">
            <table id="tbUser" class="table table-hover" style="width:100%">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Staff_ID</th>
                      <th>Name</th>
                      <th>E-mail</th>
                      <th>Password</th>
                      <th>Image</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>1</td>
                      <td>1</td>
                      <td>Bunseang</td>
                      <td>bunseang02@gmial.com</td>
                      <td>1234</td>
                      <td></td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Bunseang</td>
                    <td>bunseang02@gmial.com</td>
                    <td>1234</td>
                    <td></td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>1</td>
                  <td>Bunseang</td>
                  <td>bunseang02@gmial.com</td>
                  <td>1234</td>
                  <td></td>
                </tr>
              </tbody>
          </table>
        </div>
      </div>
</section>
<!-- /.content -->
</section>  
@stop  
@section('style')
  <script>
   $(document).ready(function() {
    $('#tbUser').DataTable();
  } );
  </script>
  <style>
  

  </style>
@stop
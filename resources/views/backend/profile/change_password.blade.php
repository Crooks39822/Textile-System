

@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Change Password</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
   @include('_message')

        <div class="row">
          <div class="col-lg-12">
           <div class="card-header">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Change Password</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Old Password</label>
                      <span style="color:red;">*</span>
                      <input type="password" class="form-control"  name="old_password" id="exampleInputEmail1" placeholder="Enter Old Password">
                    </div>
                    <span style="color:red;">{{$errors->first('password')}}</span>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Confirm Password</label>
                      <span style="color:red;">*</span>
                      <input type="password" class="form-control"  name="new_password" id="exampleInputEmail1" placeholder="Enter New Password">
                    </div>
                    <span style="color:red;">{{$errors->first('new_password')}}</span>

                  <div class="card-footer">
                    <a href="{{url('admin/dashboard')}}" class="btn btn-danger"><i class="fa-solid fas fa-reply mr-2"></i>Back</a>
                        <button type="submit" class="btn btn-primary float-right">Update</button>
                  </div>
                </form>
              </div>
           </div>
          </div>


        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.footer -->


  <!-- Control Sidebar -->
  @endsection

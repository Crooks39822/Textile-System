

@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">My Account</h1>
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
                  <h3 class="card-title">My Account</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">First name</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('name',$getRecord->name) }}" name="name" id="exampleInputEmail1" placeholder="Enter First Name">
                    </div>
                    <span style="color:red;">{{$errors->first('name')}}</span>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Last name</label>
                        <span style="color:red;">*</span>
                        <input type="text" class="form-control" value="{{ old('last_name',$getRecord->last_name) }}" name="last_name" id="exampleInputEmail1" placeholder="Enter Las Name">
                      </div>
                      <span style="color:red;">{{$errors->first('last_name')}}</span>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Phone Number</label>
                        <span style="color:red;">*</span>
                        <input type="number" class="form-control" value="{{  old('phone',$getRecord->phone)  }}" name="phone" id="exampleInputEmail1" placeholder="Enter Phone Number">
                      </div>
                      <span style="color:red;">{{$errors->first('phone')}}</span>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <span style="color:red;">*</span>
                        <input type="email" class="form-control" value="{{ old('email',$getRecord->email )}}" name="email" id="exampleInputEmail1" placeholder="Enter email">
                      </div>
                      <span style="color:red;">{{$errors->first('email')}}</span>
                
                  <div class="card-footer">
                    <a href="{{route('index')}}" class="btn btn-danger"><i class="fa-solid fas fa-reply mr-2"></i>Back</a>
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

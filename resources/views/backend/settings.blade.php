

@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Settings</h1>
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
                  <h3 class="card-title">Settings</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Factory Name</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('name',$getRecord->name) }}" name="name" id="exampleInputEmail1" placeholder="Enter First Name">
                    </div>
                    
                    <div class="form-group ">
                        <label for="exampleInputFile">Logo</label>
                        <div class="input-group">
                            <div class="custom-file">
                              <input type="file"  class="form-control" name="logo" id="exampleInputFile">

                            </div>

                          </div>
                          @if(!empty($getRecord->getLogo()))
                            <img src="{{$getRecord->getLogo()}}" style="width: auto;height: 50px;">
                            @endif
                          
                        </div>
                        <div class="form-group ">
                        <label for="exampleInputFile">Favicon</label>
                        <div class="input-group">
                            <div class="custom-file">
                              <input type="file"  class="form-control" name="favicon" id="exampleInputFile">

                            </div>

                          </div>
                          @if(!empty($getRecord->getFavicon()))
                            <img src="{{$getRecord->getFavicon()}}" style="width: auto;height: 50px;">
                            @endif
                          
                        </div>
                       


                  <div class="card-footer">
                    <a href="{{url('admin/dashboard')}}" class="btn btn-danger"><i class="fa-solid fas fa-reply mr-2"></i>Back</a>
                        <button type="submit" class="btn btn-primary float-right">Update Settings</button>
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

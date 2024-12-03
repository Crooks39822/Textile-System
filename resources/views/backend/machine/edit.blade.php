

@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Machine</h1>
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
                  <h3 class="card-title">Edit Machine</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Machine Name</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('name' ,$getRecord->name)}}" name="name" id="exampleInputEmail1" placeholder="Enter Subject Name">
                    </div>
                    
                      <div class="form-group">
                        <label for="exampleInputEmail1">Status</label>
                        <span style="color:red;">*</span>
                        <select class="form-control" name="status">
                        <option {{($getRecord->status  == 0) ? 'selected' : ''}} value="0">Active</option>
                        <option {{($getRecord->status  == 1) ? 'selected' : ''}} value="1">Inactive</option>
                        </select>
                      </div>
                      <span style="color:red;">{{$errors->first('status')}}</span>
                   
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <a href="{{url('admin/machine')}}" class="btn btn-danger"><i class="fa-solid fas fa-reply mr-2"></i>Back</a>
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

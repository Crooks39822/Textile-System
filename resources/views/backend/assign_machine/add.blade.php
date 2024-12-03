

@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Matrix</h1>
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
                  <h3 class="card-title">Add Matrix</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1"> Employee Name</label>
                      <span style="color:red;">*</span>
                      <select class="form-control" name="class_id">
                        <option value="">Select Employee</option>
                        @foreach($getEmployee as $employee)
                        <option value="{{$employee->id}}">{{$employee->name}} {{$employee->last_name}} ({{$employee->admission_number}})</option>
                        @endforeach
                       
                        </select>
                    </div>
                    <span style="color:red;">{{$errors->first('class_id')}}</span>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Machine Name</label>
                      <span style="color:red;">*</span>
                      
                        
                        @foreach($getSubject as $subjects)
                        <div>
                      <label style="font-weight: normal;">
                      <input type="checkbox" value="{{$subjects->id}}" name="subjects_id[]"> {{$subjects->name}}  {{$subjects->subject_code}}
                      </label>
                      </div>
                        @endforeach
                       
                      
                    </div>
                    <span style="color:red;">{{$errors->first('subjects_id')}}</span>
                     
                    <div class="form-group">
                        <label for="exampleInputEmail1">Status</label>
                        <span style="color:red;">*</span>
                        <select class="form-control" name="status">
                        <option value="0">Active</option>
                        <option value="1">Inactive</option>
                        </select>
                      </div>
                      <span style="color:red;">{{$errors->first('status')}}</span>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <a href="{{url('admin/assign_machine')}}" class="btn btn-danger"><i class="fa-solid fas fa-reply mr-2"></i>Back</a>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
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



@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Assign Subject</h1>
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
                  <h3 class="card-title">Edit Assign Machine</h3>
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
                        @foreach($getEmployee as $class)
                        <option {{($getRecord->class_id  == $class->id) ? 'selected' : ''}} value="{{$class->id}}">{{$class->name}} {{$class->last_name}} ({{$class->admission_number}})</option>
                        @endforeach
                       
                        </select>
                    </div>
                    <span style="color:red;">{{$errors->first('class_id')}}</span>
                    <div class="form-group">
                      <label for="exampleInputEmail1"> Machine Name</label>
                      <span style="color:red;">*</span>
                      <select class="form-control" name="subjects_id">
                        <option value="">Select Subject</option>
                        @foreach($getSubject as $subject)
                        <option {{($getRecord->subject_id  == $subject->id) ? 'selected' : ''}} value="{{$subject->id}}">{{$subject->name}} {{$subject->subject_code}}</option>
                        @endforeach
                       
                        </select>
                    </div>
                    <span style="color:red;">{{$errors->first('subjects_id')}}</span>
                    
                     
                     
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
                    <a href="{{url('admin/assign_machine')}}" class="btn btn-danger"><i class="fa-solid fas fa-reply mr-2"></i>Back</a>
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

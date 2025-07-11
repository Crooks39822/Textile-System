

@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Assign Supervisor to Department</h1>
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
                  <h3 class="card-title">Add Assign Supervisor to Department</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1"> Department Name</label>
                      <span style="color:red;">*</span>
                      <select class="form-control getClass" name="class_id" required>
                        <option value="">Select Department</option>
                        @foreach($getClass as $class)

                        <option {{(Request::get('class_id') == $class->id) ? 'selected' : ''}} value="{{ $class->id }}"> {{ $class->name }} </option>
                        @endforeach
                      </select>
                    </div>
                    <span style="color:red;">{{$errors->first('class_id')}}</span>



                   


                    <div class="form-group">
                      <label for="exampleInputEmail1">Supervisor/Leader Name</label>
                      <span style="color:red;">*</span>


                        @foreach($getTeacher as $teacher)
                        <div>
                      <label style="font-weight: normal;">
                      <input type="checkbox" value="{{$teacher->id}}" name="teacher_id[]"> {{$teacher->name}} {{$teacher->last_name}}
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
                    <a href="{{url('admin/assign_line_to_supervisor')}}" class="btn btn-danger"><i class="fa-solid fas fa-reply mr-2"></i>Back</a>
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
  @section('script')

<script type="text/javascript">
$('.getClass').change(function(){
var class_id = $(this).val();
$.ajax({

	url:"{{ url('admin/assign_class_teacher/get_subject') }}",
	type: "POST",
	data:{
	"_token": "{{ csrf_token() }}",
	class_id:class_id,
	},dataType: "json",
	success:function(response){
	$('.getSubject').html(response.html);
	},
});

});
</script>
@endsection



@extends('backend.layouts.app')
@section('style')
<link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">

  @endsection
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Assignment</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
   @include('_message')

        <div class="row">
          <div class="col-lg-12">
           <div class="card-header">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add New Assignment</h3>
                </div>

                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                  <div class="form-group">
                      <label for="exampleInputEmail1"> Class Name</label>
                      <span style="color:red;">*</span>
                      <select class="form-control getClass" name="class_id" required>
                        <option value="">Select Class</option>
                        @foreach($getClass as $class)
                        <option {{($getRecord->class_id  == $class->class_id) ? 'selected' : ''}} value="{{$class->class_id}}">{{$class->class_name}}</option>
                        @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Subject Name</label>
                        <span style="color:red;">*</span>
                        <select class="form-control getSubject" name="subject_id">
                          <option value="">Select Subject</option>
                          @foreach($getSubject as $subject)
                          <option {{($getRecord->subject_id  == $subject->subject_id) ? 'selected' : ''}} value="{{$subject->subject_id}}">{{$subject->subject_name}}</option>
                          @endforeach

                          </select>
                      </div>
                   
                      
                    <div class="form-group">
                      <label for="exampleInputEmail1">Assignment Date</label>
                      <span style="color:red;"></span>
                      <input type="date" class="form-control" value="{{ old('assignment_date',$getRecord->assignment_date)}}"  name="assignment_date" id="exampleInputEmail1" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Submission Date</label>
                      <span style="color:red;"></span>
                      <input type="date" class="form-control" value="{{ old('submission_date',$getRecord->submission_date)}}"  name="submission_date" id="exampleInputEmail1" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Document</label>
                      <span style="color:red;"></span>
                      <input type="file" class="form-control"  name="document_file" id="exampleInputEmail1">
                      @if(!empty($getRecord->getDocument()))
                      <a href="{{$getRecord->getDocument()}}" class="btn btn-primary" download="">Download</a>

                      @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description </label>

                        <textarea id="compose-textarea" name="description" class="form-control" style="height: 400px">
                        {{$getRecord->description}}
                          </textarea>
                      </div>

                  <div class="card-footer">
                    <a href="{{url('teacher/assignment')}}" class="btn btn-danger"><i class="fa-solid fas fa-reply mr-2"></i>Back</a>
                        <button type="submit" class="btn btn-primary float-right">Update</button>
                  </div>
                </form>
              </div>
           </div>
          </div>


        </div>

      </div>
    </section>
      </div>
  @endsection
  @section('script')

  <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
  
  <script>
    $(function () {

       

        $('#compose-textarea').summernote({
            height: 250,   //set editable area's height

          });

    });

    $('.getClass').change(function(){
    var class_id = $(this).val();
    $.ajax({

	url:"{{ url('admin/assignment/get_subject') }}",
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

  
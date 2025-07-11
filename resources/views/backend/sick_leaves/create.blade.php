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
            <h1 class="m-0">Add Sick Leave</h1>
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
                  <h3 class="card-title">Add Sick Leave</h3>
                </div>
</div>
               <form method="POST" action="{{ route('sick-leaves.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Employee</label>
                <select name="user_id" class="form-control" required>
                    <option value="">-- Select Employee --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} {{ $user->last_name }}  ({{ $user->admission_number }})</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Start Date</label>
                <input type="date" name="start_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label>End Date</label>
                <input type="date" name="end_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Reason</label>
                <input type="text" name="reason" class="form-control">
            </div>

            <div class="form-group">
                <label>Doctor's Note (Optional)</label>
                <input type="file" name="doctor_note_path" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Save</button>
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

  

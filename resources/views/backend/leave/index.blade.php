

@extends('backend.layouts.app')
@section('style')
<link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
<style type="text/css">
.select2-container .select2-selection--single
{

height: 40px;

}
</style>
  @endsection
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Leave Request</h1>
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
                  <h3 class="card-title">Leave Request</h3>
                </div>

                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Subject</label>
                      <span style="color:red;"></span>
                      <input type="text" class="form-control"  name="subject" id="exampleInputEmail1" placeholder="Enter Title ">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Select (Employee  / Supervisor)</label>
                      
                      <select class="form-control select2" style="width: 100%;" name="user_id">

                      <option value="">Select</option>
                   
                    </select>
                        
                    </div>

                    <select class="form-control select2" style="width: 100%;"  name="leave_type" id="leave_type" required>
                    
                          <option value="Annual Leave">Annual Leave</option>
                          <option value="Sick Leave">Sick Leave</option>
                          <option value="Maternity Leave">Maternity Leave</option>
                          <option value="Study Leave">Study Leave</option>
                      </select>
                    <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Start Date</label>
                      <span style="color:red;">*</span>
                      <input type="date" class="form-control" value="{{ old('start_date')}}" name="start_date" id="start_date">
                    </div>
                     
                    <div class="form-group">
                      <label for="exampleInputEmail1">End Date</label>
                      <span style="color:red;">*</span>
                      <input type="date" class="form-control" value="{{ old('end_date')}}" name="end_date" id="end_date">
                    </div>
                    <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Number of Days</label>
                      <span style="color:red;">*</span>
                       <input type="text" class="form-control" value="{{ old('number_of_days')}}" name="number_of_days" id="number_of_days" readonly>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Duration Type</label>
                     
                 <select class="form-control select2" style="width: 100%;"  name="duration_type" id="duration_type" required>
                    <option value="full">Full Day</option>
                    <option value="half">Half Day</option>
                 </select>
                        
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Description </label>

                        <textarea id="compose-textarea" name="message" class="form-control" style="height: 400px">

                          </textarea>
                      </div>
                      <div class="form-group col-md-6">
                      <label for="exampleInputFile">Document Upload</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file"  class="form-control" name="document" id="exampleInputFile">

                        </div>

                      </div>

                  <div class="card-footer">
                    <a href="{{url('admin/leave/list')}}" class="btn btn-danger"><i class="fa-solid fas fa-reply mr-2"></i>Back</a>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
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
  <script src="{{ asset('backend/plugins/select2/js/select2.full.min.js')}}"></script>
  <script>
    $(function () {

        $('.select2').select2({
        ajax: {
        url: '{{ url('admin/communicate/search_user') }}',
        dataType: 'json',
        delay: 250,
        data: function (data) {
            return {
            search: data.term,

            };
        },
      
        processResults: function (response){
                return {
                results:response
                  };
                },
            }
        });

        $('#compose-textarea').summernote({
            height: 250,   //set editable area's height

          });

    });
  </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function calculateDays() {
        const start = new Date($('#start_date').val());
        const end = new Date($('#end_date').val());
        const durationType = $('#duration_type').val();

        if (!isNaN(start) && !isNaN(end)) {
            let timeDiff = end - start;
            let dayDiff = timeDiff / (1000 * 3600 * 24) + 1; // inclusive

            if (dayDiff > 0) {
                if (dayDiff === 1 && durationType === 'half') {
                    $('#number_of_days').val(0.5);
                } else {
                    $('#number_of_days').val(dayDiff);
                }
            } else {
                $('#number_of_days').val('');
            }
        }
    }

    $('#start_date, #end_date, #duration_type').on('change', function () {
        calculateDays();
    });
</script>

  @endsection


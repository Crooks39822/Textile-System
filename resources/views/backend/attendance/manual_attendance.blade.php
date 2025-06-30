

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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Attendance Request</h1>
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
                  <h3 class="card-title">Attendance Request</h3>
            </div>
             </div>

                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('manual.attendance.store') }}" method="post"  enctype="multipart/form-data">
                    @csrf
                  
                    


                    <div class="form-group">
                       <label>Employee</label> 
                    <select name="employee_number" class="form-control" required> 
                      <option>Select Employee</option>
                    @foreach($employees as $emp) 
                    <option value="{{ $emp->admission_number }}">{{ $emp->name }} {{ $emp->last_name }} {{ $emp->admission_number }}</option> @endforeach 
                    </select> 
                    </div> 
                    <div class="form-group"> 
                    <label>Date</label> 
                    <input type="date" name="date" class="form-control" required>
                    </div> 
                    <div class="form-group"> <label>Clock In Time</label> 

                    <input type="time" name="clock_in" class="form-control" required> 
                    </div>
                    <div class="form-group">
                    <label>Clock Out Time</label> 
                    <input type="time" name="clock_out" class="form-control" required>
                    </div>
                    <button class="btn btn-primary">Submit</button>
                    </form> 
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
  


  @endsection
@section('script')
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/select2/js/select2.full.min.js')}}"></script>
 

  <script type="text/javascript">

    $(function () {

        $('.select2').select2({
        ajax: {
        url: '{{ url('attendance_report/search_user') }}',
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


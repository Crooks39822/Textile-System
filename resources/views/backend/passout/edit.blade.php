

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
            <h1 class="m-0">Leave Request Edit</h1>
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
                  <h3 class="card-title">Leave Request Edit</h3>
                </div>

                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                  
                    
                    <!-- <div class="form-group">
                      <label for="exampleInputEmail1">Select (Employee  / Supervisor)</label>
                      
                      <select class="form-control select2" style="width: 100%;" name="user_id">

                      <option value="">Select</option>
                   
                    </select>
                        
                    </div> -->
                      <div class="form-group">
                      <label for="exampleInputEmail1">Leave Type</label>
                      <span style="color:red;">*</span>
                      <select class="form-control" name="leave_type" required>
                        <option value="">Select Status</option>
                        @foreach($getLeaveType as $types)
                        <option  {{(old('leave_type',$getRecord->leave_type) == $types->id) ? 'selected' : ''}}  value="{{$types->id}}">{{$types->name}}</option>
                        @endforeach
                        </select>
                        <span style="color:red;">{{$errors->first('leave_type')}}</span>
                    </div>


                    
                   
                    <div class="form-group">
                      <label for="exampleInputEmail1">Start Date</label>
                      <span style="color:red;">*</span>
                      <input type="date" class="form-control" value="{{ old('start_date' ,$getRecord->start_date)}}"  name="start_date" id="start_date" required>
                    </div>
                     
                    <div class="form-group">
                      <label for="exampleInputEmail1">End Date</label>
                      <span style="color:red;">*</span>
                      <input type="date" class="form-control" value="{{ old('end_date' ,$getRecord->end_date)}}" name="end_date" id="end_date" required>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Number of Days</label>
                      <span style="color:red;">*</span>
                       <input type="text" class="form-control"  value="{{ old('number_of_days' ,$getRecord->number_of_days)}}" name="number_of_days" id="number_of_days" readonly>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Duration Type</label>
                     
                      <select class="form-control" style="width: 100%;"  name="duration_type" id="duration_type" required>
                       
                          <option {{($getRecord->duration_type  == 1) ? 'selected' : ''}} value="1">Full Day</option>
                    <option {{($getRecord->duration_type  == 2) ? 'selected' : ''}} value="2">Half Day</option>
                      </select>
                        
                    </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1"> Description </label>
                    <textarea class="form-control"  name="message" id="exampleFormControlTextarea1" rows="3">{{old('message',$getRecord->message)}}</textarea>
                  
                      </div>

                      <div class="form-group">
                      <label for="exampleInputFile">Document Upload</label>
                      
                        <div class="custom-file">
                          <input type="file"  class="form-control" name="document_file" id="exampleInputFile">

                        </div>
                     
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Status</label>
                        <span style="color:red;">*</span>
                        <select class="form-control" name="status">
                          
                        
                       <option {{($getRecord->status  == 0) ? 'selected' : ''}} value="0">Approved</option>
                         <option {{($getRecord->status  == 2) ? 'selected' : ''}} value="2">Pending</option>
                        <option {{($getRecord->status  == 1) ? 'selected' : ''}} value="1">Rejected</option>
                        </select>
                      </div>

                  <div class="card-footer">
                    <a href="{{url('admin/leave/list')}}" class="btn btn-danger"><i class="fa-solid fas fa-reply mr-2"></i>Back</a>
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
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/select2/js/select2.full.min.js')}}"></script>
 

  <script type="text/javascript">

    $(function () {

        $('.select2').select2({
        ajax: {
        url: '{{ url('admin/leave/search_user') }}',
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


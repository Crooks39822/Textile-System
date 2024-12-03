

@extends('backend.layouts.app')

@section('content')

  <div class="content-wrapper">
        <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Attendance</h1>
          </div>

        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
           <div class="card-header">
            <h3 class="card-title">Search Employee Attendance</h3>
                 </div>
            <form method="get" action="">
                <div class="card-body">
                    <div class="row">



                        <div class="form-group col-md-3">
                            <label>Department Name</label>
                            <select class="form-control getClass" id="getClass" name="class_id" required>
                                <option value="">Select Department</option>
                                @foreach($getClass as $class)
                                <option {{(Request::get('class_id') == $class->id) ? 'selected' : ''}} value="{{ $class->id }}"> {{ $class->name }} </option>
                                @endforeach

                                </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label>Attendance Date</label>
                            <input type="date" class="form-control" id="getAttendanceDate" value="{{Request::get('attendance_date')}}" required  name="attendance_date">

                        </div>

                        <div class="form-group col-md-3">
                       <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                       <a href="{{url('admin/attendance/employee')}}" class="btn btn-success" style="margin-top: 30px">Clear</a>
                        </div>

                    </div>

                </div>

            </form>
           </div>


           @if(!empty(Request::get('attendance_date')) && !empty(Request::get('class_id')))
            @include('_message')
           <div class="card">
            <div class="card-header">

            <h3 class="card-title">Employee Attendance List</h3>
            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
<table class="table table-hover text-nowrap">
                    <thead>
                      <tr>

                         <th>Clock Number</th>
                         <th>FULLNAME</th>
                        <th>ATTENDANCE</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if(!empty($getStudent) && !empty($getStudent->count()))
                @foreach($getStudent as $value)
                @php
                $attendance_type = '';
                $getAttendance = $value->getAttendance($value->id,Request::get('attendance_date'),Request::get('class_id'));

                if(!empty($getAttendance->attendance_type))
                {
                  $attendance_type = $getAttendance->attendance_type;

                }
                @endphp
                <tr>
                <td>{{ $value->admission_number}}</td>
                <td>{{ $value->name }} {{ $value->last_name }}</td>
                <td>
                <label style="margin-right: 10px;">
                <input type="radio" class="SaveAttendance" {{($attendance_type == '1') ? 'checked' : ''}} id="{{ $value->id}}" value="1" name="attendance{{ $value->id}}"> Present
            </label>
                <label style="margin-right: 10px;">
                <input type="radio" class="SaveAttendance" {{($attendance_type == '2') ? 'checked' : ''}} id="{{ $value->id}}" value="2" name="attendance{{ $value->id}}"> Late
            </label>
                <label style="margin-right: 10px;">
                <input type="radio" class="SaveAttendance" {{($attendance_type == '3') ? 'checked' : ''}} id="{{ $value->id}}" value="3" name="attendance{{ $value->id}}"> Absent
            </label>
                <label style="margin-right: 10px;">
                <input type="radio" class="SaveAttendance" {{($attendance_type == '4') ? 'checked' : ''}} id="{{ $value->id}}" value="4" name="attendance{{ $value->id}}"> Half Day
            </label>
                </td>
                @endforeach

                    @endif
                </tr>
                    </tbody>
                  </table>


        </div>


    </div>

    @endif
   </section>

  </div>
</div>
@endsection
@section('script')

<script type="text/javascript">

    $('.SaveAttendance').change(function(e){
        var student_id = $(this).attr('id'); getClass
        var attendance_type = $(this).val();
        var class_id = $('#getClass').val();
        var attendance_date = $('#getAttendanceDate').val();


        $.ajax({
            type: "POST",
            url: "{{ url('admin/attendance/employee/save') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                student_id  : student_id,
                attendance_type  : attendance_type,
                class_id  : class_id,
                attendance_date   : attendance_date
                    },
            dataType: "json",
            success:function(data){
                notify(data.message, 3000);
            }
            });



        });
 </script>

@endsection






@extends('backend.layouts.app')

@section('content')

  <div class="content-wrapper">
        <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Attendance Report <span style="color: blue;">(Total: {{$getRecord->total()}})</span></h1>
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
            <h3 class="card-title">Search  Attendance Report</h3>
                 </div>
            <form method="get" action="">
                <div class="card-body">
                    <div class="row">

                    <div class="form-group col-md-2">
                            <label>Student ID</label>
                            <input type="text" class="form-control" name="id_number" value="{{ Request::get('id_number') }}"  placeholder="Student ID">
                        </div>
                    <div class="form-group col-md-2">
                            <label>Student Name</label>
                            <input type="text" class="form-control" name="name" value="{{ Request::get('name') }}"  placeholder="Studen Name">
                        </div>
                            <div class="form-group col-md-2">
                            <label>Class Name</label>
                            <select class="form-control"  name="class_name">
                                <option value="">Select Class</option>
                                @foreach($getClass as $class)
                                <option {{(Request::get('class_name') == $class->class_id) ? 'selected' : ''}} value="{{ $class->class_id }}"> {{ $class->class_name }} </option>
                                @endforeach

                                </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label> Start Attendance Date</label>
                            <input type="date" class="form-control"  value="{{Request::get('start_attendance_date')}}"  name="start_attendance_date">

                        </div>
                        <div class="form-group col-md-2">
                            <label> End Attendance Date</label>
                            <input type="date" class="form-control"  value="{{Request::get('end_attendance_date')}}"  name="end_attendance_date">

                        </div>
                        <div class="form-group col-md-2">
                            <label>Attendance Type</label>
                            <select class="form-control"  name="attendance_type">
                                <option value="">Select Type</option>

                                <option {{(Request::get('attendance_type') == 1) ? 'selected' : ''}} value="1">Present </option>
                                <option {{(Request::get('attendance_type') == 2) ? 'selected' : ''}} value="2">Late </option>
                                <option {{(Request::get('attendance_type') == 3) ? 'selected' : ''}} value="3">Absent </option>
                                <option {{(Request::get('attendance_type') == 4) ? 'selected' : ''}} value="4"> Half Day </option>

                                </select>
                        </div>

                        <div class="form-group col-md-2">
                       <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                       <a href="{{url('teacher/attendance/attendance_report')}}" class="btn btn-success" style="margin-top: 30px">Clear</a>
                        </div>

                    </div>

                </div>

            </form>
           </div>

            @include('_message')
           <div class="card">
            <div class="card-header">

            <h3 class="card-title">Attendance List</h3>
            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
            <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>

                         <th>STUDENT ID</th>
                         <th>STUDENT NAME</th>
                         <th>CLASS NAME</th>
                        <th>ATTENDANCE</th>
                        <th>ATTENDANCE DATE</th>
                        <th>CREATED BY</th>
                        <th>CREATED DATE</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(!empty($getRecord))

                        @forelse($getRecord as $value)

                   <tr>
                   <td>{{ $value->id_number}}</td>
                   <td>{{ $value->student_name}} {{ $value->student_last_name}}</td>
                   <td>{{ $value->class_name}}</td>
                   <td>

                   @if($value->attendance_type==1)
                   Present
                   @elseif($value->attendance_type==2)
                   Late
                   @elseif($value->attendance_type==3)
                   Absent
                   @elseif($value->attendance_type==4)
                   Half Day

                   @endif
                   </td>
                   <td>{{ date('d-m-Y',strtotime($value->attendance_date ))}}</td>
                   <td>{{ $value->created_by_name}}</td>
                   <td>{{ date('d-m-Y H:i A',strtotime($value->created_at ))}}</td>
                   <tr>
                       @empty
                       <tr>
                   <td colspan="100%">No Records Found</td>

                   <tr>

                  @endforelse
                    @else
                    <tr>
                   <td colspan="100%">No Records Found</td>

                   <tr>

                       @endif
                    </tbody>
                  </table>
                  @if(!empty($getRecord))
                  <div style="padding: 10px; float:right;">
                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
           </div>
           @endif
        </div>


    </div>


   </section>

  </div>
</div>
@endsection
@section('script')

<script type="text/javascript">


 </script>

@endsection




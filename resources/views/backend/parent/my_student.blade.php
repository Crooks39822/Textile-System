

@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Students</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align:right;">

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <section class="content">
      <div class="container-fluid">


        <div class="row">
          <div class="col-md-12">
            <div class="card">
           <div class="card-header">

           @include('_message')

<h3 class="card-title">My Students</h3>
</div>
<div class="card-body table-responsive p-0" style="overflow: auto;">
<table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th > Pic</th>
                        <th >Student Name</th>
                        <th >Email</th>
                        <th>Class</th>
                        <th>Gender</th>
                       
                                             
                        <th>Action</th>

                      </tr>
                    </thead>
                    <tbody>
                    @forelse($getRecord as $value)

                    <tr>
                    <th>{{ $loop->iteration }}</th>
                        <td>
                        @if(!empty($value->getProfileDirectory()))
                        <img src="{{$value->getProfileDirectory()}}" style="width: 50px;height: 50px; border-radius: 50px;">
                        @endif
                      </td>
                        <td>{{ $value->name }} {{ $value->last_name }}</td>
                         <td>{{ $value->email }}</td>
                        

                         <td style="min-width: 90px">
                          {{ $value->class_name }}</td>
                        <td>{{ $value->gender }}</td>
                        
                        


                        <td style="min-width: 200px">

                            <a style="margin-bottom: 10px;" class="btn btn-success btn-sm" href="{{url('parent/my_student/subject/'.$value->id)}}">Subjects</a>
                            <a style="margin-bottom: 10px;" class="btn btn-warning btn-sm" href="{{url('parent/my_student/attendence/'.$value->id)}}"> Attendance</a>
                            <a style="margin-bottom: 10px;" class="btn btn-primary btn-sm" href="{{url('parent/my_student/exam_timetable/'.$value->id)}}"> Exam Timetable</a>
                            <a style="margin-bottom: 10px;" class="btn btn-primary btn-sm" href="{{url('parent/my_student/exam_result/'.$value->id)}}"> Exam Results</a>
                            <a style="margin-bottom: 10px;" class="btn btn-warning btn-sm" href="{{url('parent/my_student/calendar/'.$value->id)}}"> Calendar</a>
                            <a style="margin-bottom: 10px;" class="btn btn-success btn-sm" href="{{url('parent/my_student/assignment/'.$value->id)}}"> Assignment</a>
                            <a style="margin-bottom: 10px;" class="btn btn-warning btn-sm" href="{{url('parent/my_student/submitted_assignment/'.$value->id)}}">Submitted Assignment</a>
                            <a style="margin-bottom: 10px;" class="btn btn-primary btn-sm" href="{{url('parent/my_student/collect_fees/'.$value->id)}}">Fees Report</a>
                            <a style="margin-bottom: 10px;" href="{{url('chat?reciever_id='.base64_encode($value->id))}}" class="btn btn-success btn-sm">Send _message</a>
                            </td>

                    </tr>
                    @empty

                    <tr>
                    <td colspan="100%"> No Record Found.</td>
                    </tr>
                    @endforelse
                    </tbody>
                  </table>

<div style="padding: 10px; float:right;">

</div>
</div>


</div>






    </section>
    <!-- /.content -->
  </div>
</div>
  <!-- /.footer -->


  <!-- Control Sidebar -->
  @endsection

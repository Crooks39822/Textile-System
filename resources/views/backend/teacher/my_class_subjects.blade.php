

@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Class & Subjects  </h1>
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


           @include('_message')
           <div class="card">
            <div class="card-header">

            <h3 class="card-title">My Class & Subjects</h3>
            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
            <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>

                        <th >Class Name</th>
                        <th >Subject Name</th>
                         <th >Subject Type</th>
                         <th >My Timetable</th>
                         <th>Created Date</th>
                         <th>Action</th>

                      </tr>
                    </thead>
                    <tbody>
    @foreach($getRecord as $value)

<tr>

   <td>{{ $value->class_name }}</td>
   <td>{{ $value->subject_name }}</td>
   <td>{{ $value->subject_type }}</td>
   <td>
    @php
        $ClassSubject= $value->getMyTimeTable($value->class_id,$value->subject_id);
    @endphp
    @if(!empty($ClassSubject))

{{date('h:i A',strtotime($ClassSubject->start_time))}} to {{date('h:i A',strtotime($ClassSubject->end_time))}}
<br>
Room Number:  {{ $ClassSubject->room_number }}

    @endif

   </td>

   <td>{{ date('d-m-Y H:i A',strtotime($value->created_at ))}}</td>
   <td>
   <a href="{{url('teacher/my_class_timetable/class_timetable/'.$value->class_id .'/'.$value->subject_id)}}" class="btn btn-primary">My Class Timetable</a>
   </td>
 </tr>
 @endforeach

 <tr>

 </tr>


                    </tbody>
                  </table>

            <div style="padding: 10px; float:right;">

        </div>

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

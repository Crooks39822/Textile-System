

@extends('backend.layouts.app')

@section('content')


  <div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Exam Timetable <span style="color:blue"> ({{  $getStudent->name }} - {{  $getStudent->last_name }}) </span></h1>
          </div>

        </div>
      </div>
    </div>


    <section class="content">
      <div class="container-fluid">


        <div class="row">
          <div class="col-md-12">
            @if(!empty($getRecord))
          @foreach($getRecord as $value)
           <div class="card">
            <div class="card-header">
           <b> <h3>{{ $value['name'] }}</h3></b>

            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
            <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>Subject Name</th>
                        <th>Day </th>
                        <th>Date </th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Room Number</th>
                        <th>Full Marks</th>
                        <th>Passing Marks</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($value['exams'] as $valueS )
                        <tr>
                            <td>{{ $valueS['subject_name'] }}</td>
                            <td>{{date('l',strtotime($valueS['exam_date']))}}</td>
                            <td>{{date('d-m-Y',strtotime($valueS['exam_date']))}}</td>
                            <td>{{ !empty($valueS['start_time']) ? date('h:i A',strtotime($valueS['start_time'])) : ''}}</td>
                            <td>{{ !empty($valueS['end_time']) ? date('h:i A',strtotime($valueS['end_time'])) : ''}}</td>
                            <td>{{ $valueS['room_number'] }}</td>
                            <td>{{ $valueS['full_marks'] }}</td>
                            <td>{{ $valueS['passing_mark'] }}</td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                  </table>
        </div>
    </div>
    @endforeach
    @endif
    
    </section>
   
  </div>
</div>
  @endsection

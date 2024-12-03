

@extends('backend.layouts.app')

@section('content')


  <div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Exam Timetable </h1>
          </div>

        </div>
      </div>
    </div>


    <section class="content">
      <div class="container-fluid">


        <div class="row">
          <div class="col-md-12">
          @foreach($getRecord as $value)
          <h2 style="font-size: 32px; margin-bottom: 15px;">Class:<span style="color:blue"> {{ $value['class_name'] }}</span></h2>
          @foreach($value['exam'] as $exam)
           <div class="card">
            <div class="card-header">
            <h3><b>Exam Name: </b>{{ $exam['exam_name'] }}</h3>

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
                        @foreach ($exam['subject'] as $valueS )
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
    @endforeach
    </section>

  </div>
</div>
  @endsection

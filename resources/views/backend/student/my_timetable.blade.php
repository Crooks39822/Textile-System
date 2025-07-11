

@extends('backend.layouts.app')

@section('content')


  <div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Timetable </h1>
          </div>

        </div>
      </div>
    </div>


    <section class="content">
      <div class="container-fluid">


        <div class="row">
          <div class="col-md-12">
          @foreach($getRecord as $value)
           <div class="card">
            <div class="card-header">
           <b> <h3>{{ $value['name'] }}</h3></b>

            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
            <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>Week</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Room Number</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($value['week'] as $valueW )
                        <tr>
                            <td>{{ $valueW['week_name'] }}</td>
                            <td>{{ !empty($valueW['start_time']) ? date('h:i A',strtotime($valueW['start_time'])) : ''}}</td>
                            <td>{{ !empty($valueW['end_time']) ? date('h:i A',strtotime($valueW['end_time'])) : ''}}</td>
                            <td>{{ $valueW['room_number'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
        </div>
    </div>
    @endforeach
    </section>

  </div>
</div>
  @endsection

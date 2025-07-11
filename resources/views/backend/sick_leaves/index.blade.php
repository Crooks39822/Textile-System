@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sick Leave Records </h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align:right;">
            <a href="{{ url('/sick-leaves/create') }}" class="btn btn-primary mb-2">Add New Sick Leave Records</a>
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

            <h3 class="card-title">Search Sick Leave Records </h3>
        </div>
            <form method="get" action="">
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-3">
                            <label>Name</label>
        <input type="text" name="name" value="{{ request('name') }}" class="form-control" placeholder="Employee Name">
                        </div>
                        
                       
                         
                        <div class="form-group col-md-3">
                          <label>From Date</label>
        <input type="date" name="from" value="{{ request('from') }}" class="form-control">
                        </div>
                         <div class="form-group col-md-3">
                            <label>To Date</label>
        <input type="date" name="to" value="{{ request('to') }}" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                       <button class="btn btn-primary" type="submit" style="margin-top: 30px">Filter</button>
                       <a href="{{url('sick-leaves')}}" class="btn btn-success" style="margin-top: 30px">Clear</a>
                        </div>

                    </div>

                </div>

            </form>


           

           </div>

           @include('_message')
           <div class="card">
            <div class="card-header">

            <h3 class="card-title">Sick Leave Records List</h3>
            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
<table class="table table-bordered">
            <thead>
                <tr>
                    <th>Employee</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Reason</th>
                    <th>Doctor's Note</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sickLeaves as $leave)
                    <tr>
                        <td>{{ $leave->user->name }} {{ $leave->user->last_name }}</td>
                        <td>{{ $leave->start_date }}</td>
                        <td>{{ $leave->end_date }}</td>
                        <td>{{ $leave->reason }}</td>
                        <td>
                            @if($leave->doctor_note_path)
                                <a href="{{ asset('upload/sick_notes/' . $leave->doctor_note_path) }}" target="_blank">View Note</a>

                            @else
                                N/A
                            @endif
                        </td>
                        <td style="min-width: 150px;">
                         @if(Auth::user()->parent_id == 2)
                            <a onclick="return confirm('Are you sure want to Delete This Record?')" href="{{url('sick-leaves/'.$leave->id)}}" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                            @endif
                           
                          </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

          


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


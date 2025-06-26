

@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Pass-Out (Total: {{$getRecord->total()}}) </h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align:right;">
            <a href="{{url('passout/add')}}" class="btn btn-primary mb-2">Add New Pass-Out Request</a>
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

            <h3 class="card-title">Search Pass-Out Request </h3>
        </div>
            <form method="get" action="">
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-2">
                            <label>Employee Name</label>
                            <input type="text" class="form-control" name="name" value="{{ Request()->name }}"  placeholder="Employee Name">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Clock Number</label>
                            <input type="text" class="form-control" name="clock_no" value="{{ Request()->clock_no }}"  placeholder="Clock No:.">
                        </div>
                        
                            <div class="form-group col-md-2">
                            <label>From Date</label>
                            <input type="date" class="form-control" name="from_admission_date" value="{{ Request()->from_admission_date}}">
                        </div>
                        <div class="form-group col-md-2">
                            <label>To  Date</label>
                            <input type="date" class="form-control" name="to_admission_date" value="{{ Request()->to_admission_date}}">
                        </div> 
                       
                                                 
                        <div class="form-group col-md-2">
                       <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                       <a href="{{url('passout/list')}}" class="btn btn-success" style="margin-top: 30px">Clear</a>
                        </div>

                    </div>

                </div>

            </form>
           </div>




           @include('_message')
           <div class="card">
            <div class="card-header">

            <h3 class="card-title">Passout Request List</h3>
            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Time Out</th>
                        <th>Time In </th>
                        
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                  @forelse($getRecord as $record)
<tr>
  <th>{{ $loop->iteration }}</th>
    <td>{{ $record->employee->name }} {{ $record->employee->last_name }} ({{ $record->employee->admission_number }})</td>
    <td>{{ \Carbon\Carbon::parse($record->time_out)->format('d M Y H:i') }}</td>
    <td>
        @if($record->status == 'pending')
            <form method="POST" action="{{ url('passout/return', $record->id) }}">
                @csrf
                @method('PUT')
                <input type="datetime-local" name="time_in" class="mt-2" required>
                <button type="submit" class="btn btn-sm btn-primary mt-2">Mark Returned</button>
                
            </form>
        @else
            {{ \Carbon\Carbon::parse($record->time_in)->format('d M Y H:i') }}
        @endif
    </td>
    <td>{{ ucfirst($record->status) }}</td>


 </tr>
 @empty

 <tr>
<td colspan="100%"> No Record Found.</td>
 </tr>
 @endforelse 
                    </tbody>
                  </table>

            <div style="padding: 10px; float:right;">
            {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
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

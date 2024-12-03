

@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1> Fees Collection  </h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    <section class="content">
      <div class="container-fluid">


        <div class="row">
          <div class="col-md-12">
            <div class="card">
           <div class="card-header">

            <h3 class="card-title">Search Fees Collection Student </h3>
        </div>
            <form method="get" action="">
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-2">
                            <label>Class Name</label>
                            <select class="form-control getClass" name="class_id" required>
                        <option value="">Select Class</option>
                        @foreach($getClass as $class)
                        <option  {{(Request::get('class_id') == $class->id) ? 'selected' : ''}}  value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                        </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Student First Name</label>
                            <input type="text" class="form-control" name="first_name" value="{{ Request()->first_name }}"  placeholder="Student First Name">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Student Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="{{ Request()->last_name }}"  placeholder="Student Last Name">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Student ID</label>
                            <input type="text" class="form-control" name="student_id" value="{{ Request()->student_id }}"  placeholder="Student ID">
                        </div>



                        <div class="form-group col-md-3">
                       <button class="btn btn-primary" type="submit" style="margin-top: 30px">  Search</button>
                       <a href="{{url('admin/fees_collection/collect_fees')}}" class="btn btn-success" style="margin-top: 30px">Clear</a>
                        </div>

                    </div>

                </div>

            </form>
           </div>




           @include('_message')
           <div class="card">
            <div class="card-header">

            <h3 class="card-title">Fees Collection List</h3>
            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
<table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>Student ID</th>
                        <th >Student Name</th>
                        <th >Class  </th>
                        <th >Total </th>
                        <th >Paid </th>
                        <th >Remaining </th>
                        <th>Created Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if(!empty($getRecord))
                    @forelse($getRecord as $value)
                    @php
                        $paid_amount = $value->getPaidFees($value->id,$value->class_id);
                        $RemainingAmount = $value->total_amount - $paid_amount;
                        @endphp

                    <tr>
                    <th>{{ $value->id_number }}</th>
                    <td>{{ $value->name }} {{ $value->last_name }}</td>
                    <td>{{ $value->class_name }}</td>
                    <td>E {{ number_format($value->total_amount,2)}}</td>
                    <td>E {{ number_format($paid_amount,2)}}</td>
                    <td>E {{ number_format($RemainingAmount,2)}}</td>

                    <td>{{ date('d-m-Y H:i A',strtotime($value->created_at ))}}</td>
                    <td style="min-width: 200px">

                        <a href="{{url('admin/fees_collection/collect_fees/add_fees/'.$value->id)}}" class="btn btn-success">Collect Fees</a>

                    </td>
                    </tr>
                    @empty

                    <tr>
                    <td colspan="100%"> No Record Found.</td>
                    </tr>
                    @endforelse
                    @else
                    <tr>
            <td colspan="100%"> No Record Found.</td>
            </tr>

                    @endif
                    </tbody>
                  </table>
                  <div style="padding: 10px; float:right;">
                  @if(!empty($getRecord))
            {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
            @endif
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

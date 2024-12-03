

@extends('backend.layouts.app')

@section('content')

  
  <div class="content-wrapper">
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Submitted Assignment </h1>
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

            <h3 class="card-title">Search Submitted Assignment </h3>
        </div>
            <form method="get" action="">
                <div class="card-body">
                    <div class="row">
                    <div class="form-group col-md-2">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="student_name" value="{{ Request()->student_name }}"  placeholder="First Name">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="{{ Request()->last_name }}"  placeholder=" Last Name">
                        </div>

                        <div class="form-group col-md-2">
                            <label>From  Date</label>
                            <input type="date" class="form-control" name="from_assignment_date" value="{{ Request()->from_assignment_date}}">
                        </div>
                        <div class="form-group col-md-2">
                            <label>To  Date</label>
                            <input type="date" class="form-control" name="to_assignment_date" value="{{ Request()->to_assignment_date}}">
                        </div>
                        <div class="form-group col-md-2">
                       <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                       <a href="{{url('admin/assignment/submitted/'.$assignment_id)}}" class="btn btn-success" style="margin-top: 30px">Clear</a>
                        </div>

                    </div>

                </div>

            </form>
           </div>

           @include('_message')
           <div class="card">
            <div class="card-header">

            <h3 class="card-title">Submitted Assignment List</h3>
            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
<table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th >Student Name</th>
                        <th >Document File</th>
                        <th>Description</th>
                        <th>Created Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($getRecord as $value)

                    <tr>
                      <th>{{ $loop->iteration }}</th>
                      <td>{{ $value->first_name }} {{ $value->last_name }}</td>
                      <td>
                      @if(!empty($value->getDocument()))
                      <a href="{{$value->getDocument()}}" class="btn btn-primary" download="">Download</a>

                      @endif
                      </td>
                      
                      <td>{!! $value->description !!}</td>
                      <td>{{ date('d-m-Y',strtotime($value->created_at ))}}</td>
                      
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
    </div>



    </section>
    <!-- /.content -->
  </div>
</div>
  <!-- /.footer -->


  <!-- Control Sidebar -->
  @endsection

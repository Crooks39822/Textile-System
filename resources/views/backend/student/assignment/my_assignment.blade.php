

@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Assignment </h1>
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

            <h3 class="card-title">Search Assignment </h3>
        </div>
            <form method="get" action="">
                <div class="card-body">
                    <div class="row">

                        
                        <div class="form-group col-md-3">
                            <label>Subject Name</label>
                            <input type="text" class="form-control" name="subject_name" value="{{ Request()->subject_name }}"  placeholder="Subject Name">
                        </div>


                        <div class="form-group col-md-3">
                            <label>From Assignment Date</label>
                            <input type="date" class="form-control" name="from_assignment_date" value="{{ Request()->from_assignment_date}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label>To Assignment Date</label>
                            <input type="date" class="form-control" name="to_assignment_date" value="{{ Request()->to_assignment_date}}">
                        </div>
                        <div class="form-group col-md-2">
                       <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                       <a href="{{url('student/my_assignments')}}" class="btn btn-success" style="margin-top: 30px">Clear</a>
                        </div>

                    </div>

                </div>

            </form>
           </div>

           @include('_message')
           <div class="card">
            <div class="card-header">

            <h3 class="card-title">My Assignment List</h3>
            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
<table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>#</th>
                          <th >Class Name</th>
                        <th>Subject Name</th>
                        <th >Assignment Date</th>
                        <th >Submission Date</th>
                        <th >Document</th>
                        <th>By</th>
                        
                        <th>Description</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @forelse($getRecord as $value)

                    <tr>
                      <th>{{ $loop->iteration }}</th>
                      <td>{{ $value->class_name }}</td>
                      <td>{{ $value->subject_name }}</td>
                      <td>{{ date('d-m-Y',strtotime($value->assignment_date ))}}</td>
                      <td>{{ date('d-m-Y',strtotime($value->submission_date ))}}</td>
                      
                      <td>
                      @if(!empty($value->getDocument()))
                      <a href="{{$value->getDocument()}}" class="btn btn-primary" download="">Download</a>

                      @endif
                      </td>
                      
                      <td>{{ $value->created_by }}</td>

                      <td>{!! $value->description !!}</td>
                      <td style="min-width: 150px;">

                          <a href="{{url('student/assignment/submit/'.$value->id)}}" class="btn btn-success">Submit Assignment</a>
                          
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

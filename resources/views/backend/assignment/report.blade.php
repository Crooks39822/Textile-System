

@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student Assignment Report </h1>
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

            <h3 class="card-title">Search Student  Assignment Report </h3>
        </div>
            <form method="get" action="">
                <div class="card-body">
                    <div class="row">
                    <div class="form-group col-md-2">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="student_name" 
                            value="{{ Request()->student_name }}"  placeholder="First Name">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="last_name" 
                            value="{{ Request()->last_name }}"  placeholder="Last Name">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Class Name</label>
                            <input type="text" class="form-control" name="class_name" 
                            value="{{ Request()->class_name }}"  placeholder="Class Name">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Subject Name</label>
                            <input type="text" class="form-control" name="subject_name" value="{{ Request()->subject_name }}"  placeholder="Subject Name">
                        </div>
                        


                        <div class="form-group col-md-2">
                            <label>Assignment From </label>
                            <input type="date" class="form-control" name="from_assignment_date" value="{{ Request()->from_assignment_date}}">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Assignment To </label>
                            <input type="date" class="form-control" name="to_assignment_date" value="{{ Request()->to_assignment_date}}">
                        </div>
                        <div class="form-group col-md-2">
                            <label> Submitted From </label>
                            <input type="date" class="form-control" name="submitted_from_assignment_date" value="{{ Request()->submitted_from_assignment_date}}">
                        </div>
                        <div class="form-group col-md-2">
                            <label> Submitted To</label>
                            <input type="date" class="form-control" name="submitted_to_assignment_date" value="{{ Request()->submitted_to_assignment_date}}">
                        </div>
                        <div class="form-group col-md-2">
                       <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                       <a href="{{url('admin/assignment/assignment_reports')}}" class="btn btn-success" style="margin-top: 30px">Clear</a>
                        </div>

                    </div>

                </div>

            </form>
           </div>

           @include('_message')
           <div class="card">
            <div class="card-header">

            <h3 class="card-title">Student  Assignment Report List</h3>
            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
            <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th >Student Name</th>
                        <th >Class Name</th>
                        <th>Subject Name</th>
                        <th >Assignment Date</th>
                        <th >Submission Date</th>
                        <th >Document</th>
                        <th>Description</th>
                        <th >Submitted Document</th>
                        <th>Submitted Description</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                    <tbody>
                    @forelse($getRecord as $value)

                  <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $value->last_name }} {{ $value->last_name }}</td>
                    <td>{{ $value->class_name }}</td>
                    <td>{{ $value->subject_name }} {{ $value->subject_code }}</td>
                    <td>{{ date('d-m-Y',strtotime($value->getAssignment->assignment_date ))}}</td>
                    <td>{{ date('d-m-Y',strtotime($value->getAssignment->submission_date ))}}</td>
                    
                    <td>
                    @if(!empty($value->getAssignment->getDocument()))
                    <a href="{{$value->getAssignment->getDocument()}}" class="btn btn-primary" download="">Download</a>

                    @endif
                    </td>
                    
                    <td>{!! $value->getAssignment->description !!}</td>
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



@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Assign  Supervisor to Department </h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align:right;">
            <a href="{{url('admin/assign_line_to_supervisor/add')}}" class="btn btn-primary mb-2">Add New Assign Supervisor to Department</a>
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

            <h3 class="card-title">Search Assign Supervisor to Department </h3>
        </div>
            <form method="get" action="">
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-2">
                            <label>Department Name</label>
                            <input type="text" class="form-control" name="class_name" value="{{ Request()->class_name }}"  placeholder="Department Name">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Supervisor/ Leader Name</label>
                            <input type="text" class="form-control" name="teacher_name" value="{{ Request()->teacher_name }}"  placeholder="Supervisor/Leader Name">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Date</label>
                            <input type="date" class="form-control" name="date" value="{{ Request()->date}}">
                        </div>
                        <div class="form-group col-md-2">
                       <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                       <a href="{{url('admin/assign_line_to_supervisor')}}" class="btn btn-success" style="margin-top: 30px">Clear</a>
                        </div>

                    </div>

                </div>

            </form>
           </div>

           @include('_message')
           <div class="card">
            <div class="card-header">

            <h3 class="card-title">Assign Supervisor to Department List</h3>
            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
<table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th >Supervisor Name</th>
                        <th >Department Name</th>
                        <th >Status</th>
                        <th >Created By </th>
                        <th>Created Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @forelse($getRecord as $value)

<tr>
   <th>{{ $loop->iteration }}</th>
  <td>{{ $value->teacher_name }} {{ $value->teacher_last_name }}</td>
  <td>{{ $value->class_name }}</td>
   <td>
   @if($value->status == 0)
            Active
     @else
            Inacive
     @endif
   </td>
   <td>{{ $value->created_by }}</td>

   <td>{{ date('d-m-Y H:i A',strtotime($value->created_at ))}}</td>
   <td>

       <!--<a href="{{url('assign_class_to_teacher/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>-->
       <a href="{{url('assign_line_to_supervisor/edit_single/'.$value->id)}}" class="btn btn-primary">Edit Single</a>
       <a href="{{url('assign_line_to_supervisor/delete/'.$value->id)}}" class="btn btn-danger">Delete</a>
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

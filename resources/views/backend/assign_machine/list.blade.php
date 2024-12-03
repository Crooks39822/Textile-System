

@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Matrix  List  (Total: {{$getRecord->total()}})   </h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align:right;">
            <a href="{{url('admin/assign_machine/add')}}" class="btn btn-primary mb-2">Add New Matrix</a>
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

            <h3 class="card-title">Search  Matrix </h3>
        </div>
            <form method="get" action="">
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-3">
                            <label>Employee Name</label>
                            <input type="text" class="form-control" name="name" value="{{ Request()->name }}"  placeholder="Employee Name">
                        </div>
                        
                        <div class="form-group col-md-2">
                            <label>Machine Name</label>
                            <select class="form-control getClass" name="subject_name">
                        <option value="">Select Machine</option>
                        @foreach($getMachine as $class)
                        <option  {{(Request::get('subject_name') == $class->id) ? 'selected' : ''}}  value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                        </select>
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label>Date</label>
                            <input type="date" class="form-control" name="date" value="{{ Request()->date}}">
                        </div>
                        <div class="form-group col-md-3">
                       <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                       <a href="{{url('admin/assign_machine')}}" class="btn btn-success" style="margin-top: 30px">Clear</a>
                        </div>

                    </div>

                </div>

            </form>
           </div>




           @include('_message')
           <div class="card">
            <div class="card-header">

            <h3 class="card-title">Matrix List</h3>
            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
<table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th >Employee Name (Clock No)</th>
                        <th >Machine Name</th>
                        <th >Department</th>
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
   <td>{{ $value->employee_name }} {{ $value->last_name }} ({{ $value->admission_number }}) </td>
   <td>{{ $value->subject_name }} </td>
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
       
       <a href="{{url('assign_machine/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
       <a href="{{url('assign_machine/edit_single/'.$value->id)}}" class="btn btn-primary">Edit Single</a>
       <a href="{{url('assign_machine/delete/'.$value->id)}}" class="btn btn-danger">Delete</a>
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



    </section>
    <!-- /.content -->
  </div>
</div>
  <!-- /.footer -->


  <!-- Control Sidebar -->
  @endsection

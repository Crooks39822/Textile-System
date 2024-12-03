

@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Parent Student ({{$getParent->name}}  {{$getParent->last_name}})</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align:right;">
            
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

            <h3 class="card-title">Search Student </h3>
        </div>
            <form method="get" action="">
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-2">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="name" value="{{ Request()->name }}"  placeholder="First Name">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Last Name </label>
                            <input type="text" class="form-control" name="last_name" value="{{ Request()->last_name }}"  placeholder=" Last Name">
                        </div>
                        <div class="form-group col-md-2">
                            <label>National ID </label>
                            <input type="text" class="form-control" name="id_number" value="{{ Request()->id_number }}"  placeholder="National ID">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Mobile Number </label>
                            <input type="text" class="form-control" name="phone" value="{{ Request()->phone }}"  placeholder="Mobile Number">
                        </div>
                       
                        <div class="form-group col-md-2">
                       <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                       <a href="{{url('admin/parent/my-student/'.$parent_id)}}" class="btn btn-success" style="margin-top: 30px">Clear</a>
                        </div>

                    </div>

                </div>

            </form>
           </div>




           @include('_message')
           <div class="card">
            <div class="card-header">
            @if(!empty($getSearchStudent))


            <h3 class="card-title">Student List</h3>
            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
            <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th >Profile Pic</th>
                        <th >StudentName</th>
                        <th >National ID</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Parent Name</th>
                        <th>Status</th>
                       
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @forelse($getSearchStudent as $value)

                    <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>
                        @if(!empty($value->getProfileDirectory()))
                        <img src="{{$value->getProfileDirectory()}}" style="width: 50px;height: 50px; border-radius: 50px;">
                        @endif
                      </td>
                    <td>{{ $value->name }} {{ $value->last_name }}</td>
                    <td>{{ $value->id_number }}</td>
                    <td>{{ $value->phone }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->parent_name }}</td>
                    
                    <td>
                    @if($value->status == 0)
                                Active
                        @else
                                Inacive
                        @endif
                    </td>
                    
                    <td style="min-width: 150px;">
                        
                        <a href="{{url('admin/parent/assign_student_parent/'.$value->id.'/'.$parent_id)}}" class="btn btn-primary btn-sm">Add Student to Parent</a>
                      
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
                
           </div>
        </div>

        
    </div>
    @endif


    <div class="card-header">

<h3 class="card-title">Parent Student List</h3>
</div>
<div class="card-body table-responsive p-0" style="overflow: auto;">
<table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th >Profile Pic</th>
                        <th >StudentName</th>
                        <th >National ID</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Parent Name</th>
                        <th>Status</th>
                       
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @forelse($getRecord as $value)

                    <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>
                        @if(!empty($value->getProfileDirectory()))
                        <img src="{{$value->getProfileDirectory()}}" style="width: 50px;height: 50px; border-radius: 50px;">
                        @endif
                      </td>
                    <td>{{ $value->name }} {{ $value->last_name }}</td>
                    <td>{{ $value->id_number }}</td>
                    <td>{{ $value->phone }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->parent_name }}</td>
                    
                    <td>
                    @if($value->status == 0)
                                Active
                        @else
                                Inacive
                        @endif
                    </td>
                    
                    <td style="min-width: 150px;">
                        
                        <a href="{{url('admin/parent/assign_student_parent_delete/'.$value->id)}}" class="btn btn-danger btn-sm"> Delete </a>
                      
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

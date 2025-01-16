

@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee List  (Total: {{$getStudent->total()}})</h1>
          </div><!-- /.col -->
          @if(Auth::user()->parent_id == 2)
          <div class="col-sm-6" style="text-align:right;">
            <a href="{{url('admin/employee/add')}}" class="btn btn-primary mb-2">Add New Employee</a>
          </div><!-- /.col -->
          @endif
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
           <h3 class="card-title">Search Employee </h3>
</div>
           <form method="get" action="">
                <div class="card-body">
                    <div class="row">
                        

                        <div class="form-group col-md-2">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="name" value="{{ Request::get('name') }}"  placeholder="First Name">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Clock Number</label>
                            <input type="text" class="form-control" name="admission_number" value="{{ Request::get('admission_number') }}"  placeholder="Clock number">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Department Name</label>
                            <select class="form-control getClass" name="class_id">
                        <option value="">Select Department</option>
                        @foreach($getClass as $class)
                        <option  {{(Request::get('class_id') == $class->id) ? 'selected' : ''}}  value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                        </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label>Position Name</label>
                            <select class="form-control" name="qualification">
                        <option value="">Select Position</option>
                        @foreach($getPosition as $position)
                        <option  {{(Request::get('qualification') == $position->id) ? 'selected' : ''}}  value="{{$position->id}}">{{$position->name}}</option>
                        @endforeach
                        </select>
                        </div>
                        
                        <div class="form-group col-md-2">
                            <label>Gender</label>
                            <select class="form-control" name="gender">
                            <option value="">Select Gender</option>
                            <option {{ (Request::get('gender') == 'Male') ? 'selected' : ''}} value="Male">Male</option>
                            <option {{ (Request::get('gender') == 'Female') ? 'selected' : ''}} value="Female">Female</option>
                            <option {{ (Request::get('gender') == 'Other') ? 'selected' : ''}} value="Female">Other</option>
                            </select>

                        </div>

                        
                        <div class="form-group col-md-2">
                            <label>ID Number</label>
                            <input type="text" class="form-control" name="id_number" value="{{ Request::get('id_number') }}"  placeholder="ID Number ">
                        </div>
                         <div class="form-group col-md-2">
                            <label>Probation Status</label>
                            <select class="form-control" name="probation_status">
                            <option value="">Probation Status</option>
                            <option {{ (Request::get('probation_status') == 100) ? 'selected' : ''}} value="100">Pending</option>
                            <option {{ (Request::get('probation_status') == 1) ? 'selected' : ''}} value="1">Attended</option>
                            
                            </select>

                        </div>
                        

                        <div class="form-group col-md-2">
                            <label>Status</label>
                            <select class="form-control" name="status">
                            <option value="">Select Status</option>
                            <option {{ (Request::get('status') == 100) ? 'selected' : ''}} value="100">Active</option>
                            <option {{ (Request::get('status') == 1) ? 'selected' : ''}} value="1">Suspended</option>
                            <option {{ (Request::get('status') == 2) ? 'selected' : ''}} value="2">Layoff</option>
                            </select>

                        </div>
                        <div class="form-group col-md-2">
                            <label>Admission Date</label>
                            <input type="date" class="form-control" name="admission_date" value="{{ Request()->admission_date}}">
                        </div>
                        <div class="form-group col-md-2">
                       <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                       <a href="{{url('admin/employee')}}" class="btn btn-success" style="margin-top: 30px">Clear</a>
                        </div>

                    </div>

                </div>

            </form>

           </div>




           @include('_message')
           <div class="card">
            <div class="card-header">

            <h3 class="card-title">Employee List</h3>
            <form style="float:right;" method="post" action="{{ url('admin/employee_export') }}">
            @csrf
           
            <input type="hidden"  name="name" value="{{ Request::get('name') }}">
            <input type="hidden"  name="admission_number" value="{{ Request::get('admission_number') }}">
            <input type="hidden"  name="class_id" value="{{ Request::get('class_id') }}">
            <input type="hidden"  name="qualification" value="{{ Request::get('qualification') }}">
            <input type="hidden"  name="gender" value="{{ Request::get('gender') }}">
            <input type="hidden"  name="admission_number" value="{{ Request::get('admission_number') }}">
            <input type="hidden"  name="id_number" value="{{ Request::get('id_number') }}">
            <input type="hidden"  name="probation_status" value="{{ Request::get('probation_status') }}">
            <input type="hidden"  name="status" value="{{ Request::get('status') }}">
            <input type="hidden"  name="admission_date" value="{{ Request::get('admission_date') }}">
            <button type="submit" class="btn btn-primary">Export Excel</button>
            </form>
            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
            <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th >Pic</th>
                        <th >Fullname</th>
                        <th >Rate/hr</th>
                        <th>Phone</th>
                         <th>Department</th>
                        <th>Gender</th>
                        <th>Position</th>
                        <th>Join Date</th>
                        <th>Probation End Date</th>
                        <th>Leave Days</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($getStudent as $value)

                     <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>
                        @if(!empty($value->getProfileDirectory()))
                        <img src="{{$value->getProfileDirectory()}}" style="width: 50px;height: 50px; border-radius: 50px;">
                        @endif
                      </td>
                        <td>{{ $value->name }} {{ $value->last_name }} ({{ $value->admission_number }})</td>
                        <td>{{ $value->roll_number }}</td>
                        
                        <td>{{ $value->phone }}</td>
                       
                        <td>{{ $value->class_name }}</td>
                         <td>{{ $value->gender }}</td>
                        <td>{{ $value->position }}</td>
                        <td>{{ date('d-m-Y',strtotime($value->admission_date ))}}</td>
                        <td>
                        @if($value->probation_status == 0)
                       <spam class="btn-danger"> {{ date('d-m-Y',strtotime($value->probation_date ))}}</spam>
                          @else
                          <spam class="btn-success"> {{ date('d-m-Y',strtotime($value->probation_date ))}}</spam>
                          @endif
                          
                       </td>
                        <td>
                        @if($value->status == 0)
                                  Active
                          @elseif($value->status ==1)
                                  Suspended
                                  @elseif($value->status ==2)
                                  Layoff
                           @else
                              Gone
                          @endif
                        </td>
                        
                        

                        <td style="min-width: 150px;">
                        <a href="{{url('admin/employee/view/'.$value->id)}}" class="btn btn-success btn-sm">View Profile</a>
                            <a href="{{url('admin/employee/edit/'.$value->id)}}" class="btn btn-primary btn-sm">Edit</a>
                            @if(Auth::user()->parent_id == 2)
                            <a onclick="return confirm('Are you sure want to Delete This Record?')" href="{{url('admin/employee/delete/'.$value->id)}}" class="btn btn-danger btn-sm">Delete</a>
                            @endif
                           
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
                {!! $getStudent->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
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

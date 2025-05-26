

@extends('backend.layouts.app')

@section('content')

@php 
$EmployeeStatus = App\Models\EmployeeStatus::getRecord();
    @endphp
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
            <a href="{{url('admin/employee/0/add')}}" class="btn btn-primary mb-2">Add New Employee</a>
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

@if(!empty($EmployeeStatus->id )== 0)
           <form method="get" action="">
                <div class="card-body">
                    <div class="row">
                        

                        <div class="form-group col-md-2">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="name" value="{{ Request::get('name') }}"  placeholder="First Name">
                        </div>
                        <div class="form-group col-md-2">
                            <label>ID Number</label>
                            <input type="text" class="form-control" name="id_number" value="{{ Request::get('id_number') }}"  placeholder="ID number">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Rate</label>
                            <input type="text" class="form-control" name="roll_number" value="{{ Request::get('roll_number') }}"  placeholder="Rate">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Employee Number</label>
                            <input type="text" class="form-control" name="admission_number" value="{{ Request::get('admission_number') }}"  placeholder="Employee number">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Qualifications</label>
                            <input type="text" class="form-control" name="qualification" value="{{ Request::get('qualification') }}"  placeholder="Qualifications">
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
                            <label>Designation </label>
                            <select class="form-control" name="designation">
                        <option value="">Select Designation</option>
                        @foreach($getPosition as $position)
                        <option  {{(Request::get('designation') == $position->id) ? 'selected' : ''}}  value="{{$position->id}}">{{$position->name}}</option>
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
                            <label>Probation Status</label>
                            <select class="form-control" name="probation_status">
                            <option value="">Probation Status</option>
                            <option {{ (Request::get('probation_status') == 100) ? 'selected' : ''}} value="100">Pending</option>
                            <option {{ (Request::get('probation_status') == 1) ? 'selected' : ''}} value="1">Attended</option>
                            
                            </select>

                        </div>
                        <div class="form-group col-md-2">
                            <label>From Admission Date</label>
                            <input type="date" class="form-control" name="from_admission_date" value="{{ Request()->from_admission_date}}">
                        </div>
                        <div class="form-group col-md-2">
                            <label>To Admission Date</label>
                            <input type="date" class="form-control" name="to_admission_date" value="{{ Request()->to_admission_date}}">
                        </div> 

                        <div class="form-group col-md-2">
                       <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                       <a href="{{url('admin/employee/0')}}" class="btn btn-success" style="margin-top: 30px">Clear</a>
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
            <input type="hidden"  name="designation" value="{{ Request::get('designation') }}">
            <input type="hidden"  name="qualification" value="{{ Request::get('qualification') }}">
            <input type="hidden"  name="gender" value="{{ Request::get('gender') }}">
            
            <input type="hidden"  name="id_number" value="{{ Request::get('id_number') }}">
            <input type="hidden"  name="probation_status" value="{{ Request::get('probation_status') }}">
            <input type="hidden"  name="roll_number" value="{{ Request::get('roll_number') }}">
            <input type="hidden"  name="from_admission_date" value="{{ Request::get('from_admission_date') }}">
            <input type="hidden"  name="to_admission_date" value="{{ Request::get('to_admission_date') }}">
            <a href="{{url('admin/enpf_export')}}" class="btn btn-success">Export ENPF</a>
            <button type="submit" class="btn btn-primary">Export Excel</button>
            </form>
            @endif
            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
            <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th >Pic</th>
                        <th >Fullname</th>
                        <th >Rate/hr/Day</th>
                        <th>ID Number</th>
                        <th>Phone</th>
                         <th>Department/Line</th>
                        <th>Gender</th>
                        <th>Designation</th>
                        <!-- <th>EXIT</th> -->
                        <th>Join Date</th>
                        <th>Probation End Date</th>
                        <th>Status</th>
                        <th>Update At</th>
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
                        <td>
                        @if(!empty($value->new_rate))
                            {{ $value->new_rate }} <span class="right badge badge-success"> New Rate</span>
                          @else
                          @if($value->probation_date >= date('Y-m-d'))
                          {{ $value->roll_number }}<span class="right badge badge-warning"> Probation</span>
                          @else
                          {{ $value->roll_number }}<span class="right badge badge-danger"> Old Rate</span>
                          @endif
                          @endif
                          
                       </td>
                       
                        <td>{{ $value->id_number }}</td>
                        
                        <td>{{ $value->phone }}</td>
                       
                        <td>{{ $value->class_name }}</td>
                         <td>{{ $value->gender }}</td>
                        <td>{{ $value->position }}</td>
                        <!-- <td>
                        @if(Auth::user()->parent_id == 2)
                            
                           
                          @if($value->status == 0)
<a onclick="return confirm('Are you sure this Employee has left the company?')"  href="{{url('admin/employee_update/'.$value->id)}}" class="btn btn-danger">EXIT</a>
          @else
          <a  href="{{url('admin/employee_update/'.$value->id)}}" class="btn btn-danger">OFF</a>       
          
          @endif
          @endif
</td> -->
                        <td>{{ date('d-m-Y',strtotime($value->admission_date ))}}</td>
                        <td>
                        @if($value->probation_status == 0)
                       <spam class="btn-danger"> {{ date('d-m-Y',strtotime($value->probation_date ))}}</spam>
                          @else
                          <spam class="btn-success"> {{ date('d-m-Y',strtotime($value->probation_date ))}}</spam>
                          @endif
                          
                       </td>
                        <td>
                       {{$value->employeestatus}} 
                        </td>
                        <td>{{ date('d-m-Y',strtotime($value->updated_at ))}}</td>
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



@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Supervisor List  (Total: {{$getTeacher->total()}})</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align:right;">
            <a href="{{url('admin/supervisor/0/add')}}" class="btn btn-primary mb-2">Add New Supervisor</a>
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
           <h3 class="card-title">Search Supervisor </h3>
</div>
           <form method="get" action="">
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-2">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="name" value="{{ Request::get('name') }}"  placeholder="First Name">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="{{ Request::get('last_name') }}"  placeholder="Last Name">
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
                            <label>Mobile Number</label>
                            <input type="text" class="form-control" name="phone" value="{{ Request::get('phone') }}"  placeholder="Mobile Number ">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Marital Status</label>
                            <input type="text" class="form-control" name="marital_status" value="{{ Request::get('marital_status') }}"  placeholder="Marital Status ">
                        </div>

                        <div class="form-group col-md-2">
                            <label>Status</label>
                            <select class="form-control" name="status">
                            <option value="">Select Status</option>
                            <option {{ (Request::get('status') == 100) ? 'selected' : ''}} value="100">Active</option>
                            <option {{ (Request::get('status') == 1) ? 'selected' : ''}} value="1">Inactive</option>

                            </select>

                        </div>
                        <div class="form-group col-md-2">
                            <label>Date of Joining</label>
                            <input type="date" class="form-control" name="admission_date" value="{{ Request()->admission_date}}">
                        </div>
                        <div class="form-group col-md-2">
                       <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                       <a href="{{url('admin/supervisor')}}" class="btn btn-success" style="margin-top: 30px">Clear</a>
                        </div>

                    </div>

                </div>

            </form>

           </div>




           @include('_message')
           <div class="card">
            <div class="card-header">

            <h3 class="card-title">Supervisor List</h3>
            <form style="float:right;" method="post" action="">
            @csrf
           
              <a href="{{url('admin/enpf_export')}}" class="btn btn-success">Export ENPF</a>
            
             </form>
            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
            <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th> Pic</th>
                        <th >Supervisor Name</th>
                        <th>Rate(Day/Hr)</th>
                        <th>Department</th>
                        <th>Gender</th>
                        <th>ID</th>
                        <th>Phone</th>
                        <!-- <th>EXIT</th> -->
                        <th>Join Date</th>
                        <th>Probation End</th>
                        <th>Status</th>
                        <th>Update At</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @forelse($getTeacher as $value)

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
   <td>{{ $value->class_name }}</td>
   <td>{{ $value->gender }}</td>
   <td>{{ $value->id_number }}</td>
   <td>{{ $value->phone }}</td>
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
   <!-- <a href="{{url('admin/supervisor/view/'.$value->id)}}" class="btn btn-success">View Profile</a> -->
       <a href="{{url('admin/supervisor/edit/'.$value->id)}}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
       <a onclick="return confirm('Are you sure want to Delete This Record?')" href="{{url('admin/supervisor/delete/'.$value->id)}}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
      
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
                {!! $getTeacher->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
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
  

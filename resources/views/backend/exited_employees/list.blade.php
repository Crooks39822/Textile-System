

@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Total Exited Employees List  (Total: {{$getStudent->total()}})</h1>
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
           <h3 class="card-title">Search Exited Employee </h3>
</div>
           <form method="get" action="">
                <div class="card-body">
                    <div class="row">
                        

                        <div class="form-group col-md-2">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="name" value="{{ Request::get('name') }}"  placeholder="First Name">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Employee Number</label>
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
                            <label>Admission Date</label>
                            <input type="date" class="form-control" name="admission_date" value="{{ Request()->admission_date}}">
                        </div>
                        <div class="form-group col-md-2">
                       <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                       <a href="{{url('admin/exited_employees')}}" class="btn btn-success" style="margin-top: 30px">Clear</a>
                        </div>

                    </div>

                </div>

            </form>

           </div>




           @include('_message')
           <div class="card">
            <div class="card-header">

            <h3 class="card-title">Exited Employee List</h3>
            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
            <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th >Pic</th>
                        <th >Fullname</th>
                        <th >Rate(Day/Hr)</th>
                        <th>Phone</th>
                         <th>Department</th>
                        <th>Gender</th>
                        <th>Activate</th>
                        
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
                        <td style="min-width: 150px;">
                        @if(Auth::user()->parent_id == 2)
                            
                           
                          @if($value->status == 1)
<a href="{{url('admin/employee_update/'.$value->id)}}" class="btn btn-success">Bring Back</a>
          @else
          <a onclick="return confirm('Are you sure you want to bring this employee Back?')"  href="{{url('admin/employee_update/'.$value->id)}}" class="btn btn-success">Bring Back</a>       
          
          @endif
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

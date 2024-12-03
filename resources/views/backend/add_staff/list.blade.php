

@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Admin Staff  (Total: {{$getRecord->total()}})</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align:right;">
            <a href="{{url('admin/staff/add')}}" class="btn btn-primary mb-2">Add New Staff</a>
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

            <h3 class="card-title">Search Admin Staff </h3>
        </div>
            <form method="get" action="">
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-3">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="name" value="{{ Request()->name }}"  placeholder="First Name">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Position Name</label>
                            <select class="form-control" name="occupation">
                        <option value="">Select Position</option>
                        @foreach($getRecords as $position)
                        <option  {{(Request::get('occupation') == $position->id) ? 'selected' : ''}}  value="{{$position->id}}">{{$position->name}}</option>
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
                            <label>Status</label>
                            <select class="form-control" name="status">
                            <option value="">Select Status</option>
                            <option {{ (Request::get('status') == 100) ? 'selected' : ''}} value="100">Active</option>
                            <option {{ (Request::get('status') == 1) ? 'selected' : ''}} value="1">Inactive</option>

                            </select>

                        </div>
                        <div class="form-group col-md-3">
                            <label>Date</label>
                            <input type="date" class="form-control" name="date" value="{{ Request()->date}}">
                        </div>
                        <div class="form-group col-md-3">
                       <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                       <a href="{{url('admin/staff')}}" class="btn btn-success" style="margin-top: 30px">Clear</a>
                        </div>

                    </div>

                </div>

            </form>
           </div>




           @include('_message')
           <div class="card">
            <div class="card-header">

            <h3 class="card-title">Admin Staff List</h3>
            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
            <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th >Profile Pic</th>
                        <th >Name</th>
                        <th >Gender</th>
                        <th>Phone</th>
                        <th>Position</th>
                        <th>Join Date</th>
                        <th>Probation End Date</th>
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
                        <td>{{ $value->gender }}</td>
                        <td>{{ $value->phone }}</td>
                        <td>{{ $value->admin_position }}</td>
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
                          @else
                                  Inacive
                          @endif
                        </td>

                        <td>
                        <a href="{{url('admin/staff/view/'.$value->id)}}" class="btn btn-success btn-sm">View Profile</a>
                            <a href="{{url('admin/staff/edit/'.$value->id)}}" class="btn btn-primary btn-sm">Edit</a>
                            <a onclick="return confirm('Are you sure want to Delete This Record?')" href="{{url('admin/staff/delete/'.$value->id)}}" class="btn btn-danger btn-sm">Delete</a>
                           
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

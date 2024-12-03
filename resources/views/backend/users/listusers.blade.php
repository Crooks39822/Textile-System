

@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Admins  (Total: {{$getRecord->total()}})</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align:right;">
            <a href="{{route('user_add')}}" class="btn btn-primary mb-2">Add New User</a>
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

            <h3 class="card-title">Search User </h3>
        </div>
            <form method="get" action="">
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-3">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="name" value="{{ Request()->name }}"  placeholder="First Name">
                        </div>

                        <div class="form-group col-md-3">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ Request()->email}}"  placeholder="Email">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Date</label>
                            <input type="date" class="form-control" name="date" value="{{ Request()->date}}">
                        </div>
                        <div class="form-group col-md-3">
                       <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                       <a href="{{url('admin/users')}}" class="btn btn-success" style="margin-top: 30px">Clear</a>
                        </div>

                    </div>

                </div>

            </form>
           </div>




           @include('_message')
           <div class="card">
            <div class="card-header">

            <h3 class="card-title">User List</h3>
            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
<table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Profile</th>
                        <th >First name</th>
                        <th >Last name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created Date</th>
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
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->last_name }}</td>
                        <td>{{ $value->phone }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ !empty($value->is_role) ? 'Admin' : 'General User'}}</td>
                        <td>{{ date('d-m-Y H:i A',strtotime($value->created_at ))}}</td>
                        <td>

                            <a href="{{url('admin/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{url('admin/delete/'.$value->id)}}" class="btn btn-danger">Delete</a>
                            <a href="{{url('chat?reciever_id='.base64_encode($value->id))}}" class="btn btn-success">Send _message</a>
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

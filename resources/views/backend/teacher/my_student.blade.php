

@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Student List </h1>
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

           @include('_message')
           <div class="card">
            <div class="card-header">

            <h3 class="card-title">My Student List</h3>
            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
            <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th >Profile Pic</th>
                        <th >Student Name</th>
                        <th >Email</th>
                        <th>Phone</th>
                        <th>Admission Number</th>
                        <th>Roll Number</th>
                        <th>Class</th>
                        <th>Gender</th>
                        <th>DOB</th>
                        <th>Age</th>
                        <th>ID Number</th>
                        <th>Physical Address</th>
                        <th>Admission Date</th>
                        <th>Previous School</th>
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
                        <td>{{ $value->name }} {{ $value->last_name }}</td>

                        <td>{{ $value->email }}</td>
                        <td>{{ $value->phone }}</td>
                        <td>{{ $value->admission_number }}</td>
                        <td>{{ $value->roll_number }}</td>
                        <td>{{ $value->class_name }}</td>
                        <td>{{ $value->gender }}</td>
                        <td>
                        @if(!empty($value->date_of_birth))
                        {{ date('d-m-Y',strtotime($value->date_of_birth ))}}
                        @endif
                       </td>
                        <td>{{ $value->age }}</td>
                        <td>{{ $value->id_number }}</td>
                        <td>{{ $value->address }}</td>
                        <td>
                        @if(!empty($value->admission_date))
                        {{ date('d-m-Y',strtotime($value->admission_date ))}}
                        @endif
                        </td>
                        <td>{{ $value->previous_school }}</td>
                        <td style="min-width: 200px">

                            <a style="margin-bottom: 10px;" href="{{url('chat?reciever_id='.base64_encode($value->id))}}" class="btn btn-success btn-sm">Send _message</a>
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

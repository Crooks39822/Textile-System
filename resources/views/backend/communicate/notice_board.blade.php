

@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Notice Board List (Total: {{$getRecord->total()}})</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align:right;">
            <a href="{{ url('admin/communicate/notice_board_add') }}" class="btn btn-primary mb-2">Add New Notice Board</a>
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


            <h3 class="card-title">Search Notice Board </h3>
        </div>
            <form method="get" action="">
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-2">
                            <label>Title</label>
                            <input type="text" class="form-control" name="name" value="{{ Request()->name }}"  placeholder="Enter Title">
                        </div>


                             <div class="form-group col-md-2">
                                 <label> Notice Date Start</label>
                                 <input type="date" class="form-control"  value="{{Request::get('start_notice_date')}}"  name="start_notice_date">

                             </div>
                             <div class="form-group col-md-2">
                                 <label>Notice Date End </label>
                                 <input type="date" class="form-control"  value="{{Request::get('end_notice_date')}}"  name="end_notice_date">

                             </div>

                             <div class="form-group col-md-2">
                                <label> Published Date Start</label>
                                <input type="date" class="form-control"  value="{{Request::get('start_publish_date')}}"  name="start_publish_date">

                            </div>
                            <div class="form-group col-md-2">
                                <label>Published Date End </label>
                                <input type="date" class="form-control"  value="{{Request::get('end_publish_date')}}"  name="end_publish_date">

                            </div>
                             <div class="form-group col-md-2">
                                 <label>Message To</label>
                                 <select class="form-control"  name="message_to">
                                     <option value="">Select</option>

                                     <option {{(Request::get('message_to') == 3) ? 'selected' : ''}} value="3">Employees </option>
                                    
                                     <option {{(Request::get('message_to') == 2) ? 'selected' : ''}} value="2">Supervisors </option>


                                     </select>
                             </div>

                             <div class="form-group col-md-2">
                            <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                            <a href="{{url('admin/communicate/notice_board')}}" class="btn btn-success" style="margin-top: 30px">Clear</a>
                             </div>

                         </div>

                     </div>

                 </form>
                </div>





           @include('_message')
           <div class="card">
            <div class="card-header">

            <h3 class="card-title">Notice Board List</h3>
            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
<table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th >Notice Date</th>
                        <th>Publish On</th>
                        <th>Message To</th>
                        <th>Created By</th>
                        <th>Created Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($getRecord as $value)

                        <tr>
                           <th>{{ $loop->iteration }}</th>
                           <td>{{ $value->title }}</td>
                          <td>{{ $value->notice_date }}</td>
                           <td>{{ $value->publish_date }}</td>
                           <td>
                            @foreach($value->getMeassage as $message)
                            @if($message->message_to == 2)
                            <div>Teacher</div>
                            @elseif($message->message_to == 3)
                            <div>Student</div>

                            @elseif($message->message_to == 4)
                            <div>Parent</div>

                            @endif
                            @endforeach
                            </td>
                           <td>{{ $value->created_by_name }}</td>


                           <td>{{ date('d-m-Y H:i A',strtotime($value->created_at ))}}</td>
                           <td>

                               <a href="{{url('admin/communicate/notice_board_edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                               <a href="{{url('admin/communicate/notice_board_delete/'.$value->id)}}" class="btn btn-danger">Delete</a>
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

  </div>
</div>

  @endsection

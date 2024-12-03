

@extends('backend.layouts.app')

@section('content')

  <div class="content-wrapper">
        <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Positions  (Total: {{$getRecord->total()}})</h1>
          </div>
          <div class="col-sm-6" style="text-align:right;">
            <a href="{{url('admin/positions/add')}}" class="btn btn-primary mb-2">Add New Position</a>
          </div>
        </div>
      </div>
    </div>


    <section class="content">
      <div class="container-fluid">


        <div class="row">
          <div class="col-md-12">
            <div class="card">
           <div class="card-header">

            <h3 class="card-title">Search Position </h3>
        </div>
            <form method="get" action="">
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-3">
                            <label>Position Name</label>
                            <input type="text" class="form-control" name="name" value="{{ Request()->name }}"  placeholder="Position Name">
                        </div>

                        <div class="form-group col-md-3">
                            <label>Date</label>
                            <input type="date" class="form-control" name="date" value="{{ Request()->date}}">
                        </div>
                        <div class="form-group col-md-3">
                       <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                       <a href="{{url('admin/positions')}}" class="btn btn-success" style="margin-top: 30px">Clear</a>
                        </div>

                    </div>

                </div>

            </form>
           </div>




           @include('_message')
           <div class="card">
            <div class="card-header">

            <h3 class="card-title">Position List</h3>
            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
<table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th >Position Name</th>
                        <th >Description </th>
                        <th >Gazette_Rate </th>
                                                <th>Created Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($getRecord as $value)

                     <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->note }}</td>
                        <td>{{ $value->gazett_rate }}</td>
                        
                        <td>{{ date('d-m-Y H:i A',strtotime($value->created_at ))}}</td>
                         <td style="min-width: 200px;">

                            <a href="{{url('admin/positions/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{url('admin/positions/delete/'.$value->id)}}" class="btn btn-danger">Delete</a>
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

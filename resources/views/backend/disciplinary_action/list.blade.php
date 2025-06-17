

@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Disciplinary Actions (Total: {{$getRecord->total()}}) </h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align:right;">
            <a href="{{url('admin/employees/disciplinary/add')}}" class="btn btn-primary mb-2">Take Disciplinary Action</a>
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

            <h3 class="card-title">Search Disciplinary Action </h3>
        </div>
            <form method="get" action="">
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-2">
                            <label>Employee Name</label>
                            <input type="text" class="form-control" name="name" value="{{ Request()->name }}"  placeholder="Employee Name">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Clock Number</label>
                            <input type="text" class="form-control" name="clock_no" value="{{ Request()->clock_no }}"  placeholder="Clock No:.">
                        </div>
                        
                            <div class="form-group col-md-2">
                            <label>From Date</label>
                            <input type="date" class="form-control" name="from_admission_date" value="{{ Request()->from_admission_date}}">
                        </div>
                        <div class="form-group col-md-2">
                            <label>To  Date</label>
                            <input type="date" class="form-control" name="to_admission_date" value="{{ Request()->to_admission_date}}">
                        </div> 
                       
                                                 
                        <div class="form-group col-md-2">
                       <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                       <a href="{{url('admin/employees/disciplinary/list')}}" class="btn btn-success" style="margin-top: 30px">Clear</a>
                        </div>

                    </div>

                </div>

            </form>
           </div>




           @include('_message')
           <div class="card">
            <div class="card-header">

            <h3 class="card-title">Disciplinary Action List</h3>
            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action Type</th>
                        <th>Disciplinary Date </th>
                      
                        <th>Description</th>
                        
                         <th>Download</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                    @forelse($getRecord as $value)

<tr>
   <th>{{ $loop->iteration }}</th>
   <td> {{$value->firstname}} {{$value->lastname}} ({{$value->clock_number}})</td>
  <td>
                       {{$value->action_types}} 
                        </td>
   
   <td>{{ date('d-M-Y',strtotime($value->start_date ))}}</td>
   <!-- <td>{{ date('d-M-Y',strtotime($value->end_date ))}}</td> -->
   

   
   <td>{!! $value->message !!}</td>
    
   <td>
                    @if(!empty($value->getDocument()))
                      <a href="{{$value->getDocument()}}" class="btn btn-primary" download="">Download</a>

                      @endif
                      </td>
    <td style="min-width: 150px;">
      
       <a href="{{url('admin/employees/disciplinary/edit/'.$value->id)}}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
        @if(Auth::user()->parent_id == 2)
       <a onclick="return confirm('Are you sure want to Delete This Leave  ?')"  href="{{url('admin/employees/disciplinary/delete/'.$value->id)}}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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

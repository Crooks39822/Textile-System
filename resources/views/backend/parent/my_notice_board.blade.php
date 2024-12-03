

@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Notice Board (Total: {{$getRecord->total()}}) </h1>
          </div>
          
        </div>
      </div>
    </section>
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
                    <div class="form-group col-md-3">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" value="{{ Request()->title }}"  placeholder="Enter Title">
                        </div>
                    <div class="form-group col-md-3">
                                 <label> Notice Date Start</label>
                                 <input type="date" class="form-control"  value="{{Request::get('start_notice_date')}}"  name="start_notice_date">

                             </div>
                             <div class="form-group col-md-3">
                                 <label>Notice Date End </label>
                                 <input type="date" class="form-control"  value="{{Request::get('end_notice_date')}}"  name="end_notice_date">

                             </div>

                             
                            
                        <div class="form-group col-md-3">
                       <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                       <a href="{{url('student/my_notice_board')}}" class="btn btn-success" style="margin-top: 30px">Clear</a>
                        </div>

                    </div>

                </div>

            </form>
           </div>
          
        @foreach($getRecord as $value)
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            

             
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h5>{{$value->title}}</h5>
                <h6 style="margin-top: 5px">{{date('d-m-Y',strtotime($value->notice_date))}}</h6>
              </div>
              <!-- /.mailbox-read-info -->
              
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                {!!$value->message!!}
              </div>
              
            </div>
          </div>
          
        </div>
        <div class="col-md-12">
       @endforeach
       <div style="padding: 10px; float:right;">
            {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
        </div>
        </div>
      </div>
      
      </div>
    </section>
   
  </div> 
@endsection

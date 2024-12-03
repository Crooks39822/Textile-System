

@extends('backend.layouts.app')

@section('content')

 
  <div class="content-wrapper">
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add New Position</h1>
          </div>

        </div>
      </div>
    </div>
    
    <section class="content">
      <div class="container-fluid">
   @include('_message')

        <div class="row">
          <div class="col-lg-12">
           <div class="card-header">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add New Position</h3>
                </div>
               
                <form action="" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Position Name</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('name')}}" name="name"  placeholder="Enter Examination Name">
                    </div>
                    <span style="color:red;">{{$errors->first('name')}}</span>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description </label>
                        
                        <textarea class="form-control" value="{{ old('notes')}}" name="notes" roow="6" placeholder="Enter Notes"></textarea>
                      </div>
                      <span style="color:red;">{{$errors->first('notes')}}</span>
                     
                   
                  <div class="card-footer">
                    <a href="{{url('admin/positions')}}" class="btn btn-danger"><i class="fa-solid fas fa-reply mr-2"></i>Back</a>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                  </div>
                </form>
              </div>
           </div>
          </div>


        </div>
       

      </div>
    </section>
    
  </div>
  
  @endsection

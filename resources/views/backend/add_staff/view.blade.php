

@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Staff Profile</h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
   @include('_message')

        <div class="row">
          <div class="col-lg-12">
           <div class="card-header">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Staff Profile</h3>
                </div>
                <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          
          <div class="card-body text-center">
          @if(!empty($getRecord->getProfileDirectory()))
            <img src="{{$getRecord->getProfileDirectory()}}" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
              @endif
            <h5 class="my-3">{{ old('name',$getRecord->name)}} {{ old('last_name',$getRecord->last_name)}}</h5>
            <p class="text-muted mb-1">{{ old('email',$getRecord->email)}}</p>
            <p class="text-muted mb-4">Member Since: {{ old('admission_date',$getRecord->admission_date)}}</p>
            
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
              <li class="list-group-item d-flex justify-content-center align-items-center p-3">
                
                <h3 class="mb-0">Position: </h3>
                
              </li>
              <li class="list-group-item d-flex justify-content-center  p-3">
               
                <p class="mb-0">{{old('occupation',$getClass->admin_position)}}</p>
              </li>
             
            </ul>
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
              <li class="list-group-item d-flex justify-content-center align-items-center p-3">
                
                <h3 class="mb-0">Banking Details: </h3>
                
              </li>
              <li class="list-group-item d-flex justify-content-center  p-3">
             
                <p class="mb-0"> {{$getRecord->bank_account}}</p>
               
              </li>
              <li class="list-group-item d-flex justify-content-center  p-3">
             
                <p class="mb-0"> {{$getRecord->bank_name}}</p>
               
              </li>
              
              <div class="card-footer">
                    <a href="{{url('admin/staff')}}" class="btn btn-danger"><i class="fa-solid fas fa-reply mr-2"></i>Back</a>
                       
                  </div>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mobile Number:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ old('phone',$getRecord->phone)}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Gender:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ old('phone',$getRecord->gender)}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Date of Birth:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ old('date_of_birth',$getRecord->date_of_birth)}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Marital Status:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ old('marital_status',$getRecord->marital_status)}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">ID Number:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ old('id_number',$getRecord->id_number)}}</p>
              </div>
            </div>
            <hr>
           
           
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Physical Address:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{old('address',$getRecord->address)}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0"> Probation End Date:</p>
              </div>
              <div class="col-sm-9">
              <p class="mb-1" style="font-size: .99rem;">{{old('probation_date',$getRecord->probation_date)}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Status:</p>
              </div>
              <div class="col-sm-9">
              @if($getRecord->status == 1)
                    
                    <p class="text-muted mb-0" style="font-size: .99rem;">Inactive</p>
                @else
                <p class="text-muted mb-0" style="font-size: .99rem;">Active</p>
                
                @endif
               
              </div>
            </div>
            <hr>
            @if(!empty($getRecord->getDocument()))
                      
                      <iframe src="{{$getRecord->getDocument()}}" width="100%" height="600px">Preview</iframe>

                      @endif
        </div>
      </div>
    </div>

    
  </div>
                
              </div>
           </div>
          </div>


        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.footer -->


  <!-- Control Sidebar -->
  @endsection

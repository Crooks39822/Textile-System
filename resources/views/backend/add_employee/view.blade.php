

@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Employee Profile</h1>
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
                  <h3 class="card-title">Employee Profile</h3>
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
            <p class="text-muted mb-4">Employee Number: {{ old('admission_number',$getRecord->admission_number)}}</p>
            <p class="text-muted mb-4">Admission Date: {{ old('admission_date',$getRecord->admission_date)}}</p>
           
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
              <li class="list-group-item d-flex justify-content-center align-items-center p-3">
                
                <p class="mb-0">Department:({{$getClass->class_name}}) </p>
                
                
              </li>
              <li class="list-group-item d-flex justify-content-center  p-3">
              <p class="mb-0">Designation: ({{$getClass->position}}) </p>
                              
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
                    <a href="{{url('admin/employee/0')}}" class="btn btn-danger"><i class="fa-solid fas fa-reply mr-2"></i>Back</a>
                       
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
                <p class="mb-0">Age:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$getRecord->age}} </p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">ID No:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ old('id_number',$getRecord->id_number)}} </p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">GRADED TAX NUMBER:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ old('tax_number',$getRecord->tax_number)}} </p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Old Rate Per Hour:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ old('roll_number',$getRecord->roll_number)}} </p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0"> New Rate Per Hour:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ old('new_rate',$getRecord->new_rate)}} </p>
              </div>
            </div>
            <hr>
            
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Next of Kin:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ old('nxt_name',$getRecord->nxt_name)}} ({{ old('nxt_contact',$getRecord->nxt_contact)}}) {{ old('relationship',$getRecord->relationship)}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Residential:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{old('address',$getRecord->address)}}</p>
              </div>
            </div>
            <hr>
            
            
        <div class="row">
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">Previous</span>  Employer:
                </p>
                <p class="mb-1" style="font-size: .99rem;">{{old('previous_school',$getRecord->previous_school)}}</p>
                <p class="mb-1" style="font-size: .99rem;">Qualification: {{old('qualification',$getRecord->qualification)}}</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1"></span> Probation End Date
                </p>
                <p class="mb-1" style="font-size: .99rem;">{{old('probation_date',$getRecord->probation_date)}}</p>
                
                </div>
                
              </div>
            </div>
          </div>
            @if(!empty($getRecord->getDocument()))
                      
             <a href="{{ $getRecord->getDocument() }}" target="_blank">Preview Contract</a>


                   @else
                No Contract Attached
              @endif
         
        </div>
      

                    
      </div>
    </div>
    

    
  </div>
                
              </div>
           </div>
          </div>


        </div>
        <div class="card mt-4">
  <div class="card-header">
    <h3 class="card-title">Sick Sheets History</h3>
  </div>
  <div class="card-body">
    @if($getRecord->sickLeaves->count() > 0)
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Description</th>
            <th>Doctor's Note</th>
          </tr>
        </thead>
        <tbody>
          @foreach($getRecord->sickLeaves as $sick)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ \Carbon\Carbon::parse($sick->start_date)->format('d M Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($sick->end_date)->format('d M Y') }}</td>
            <td>{{ $sick->reason }}</td>
            <td>
              @if($sick->doctor_note_path)
                <a href="{{ asset('upload/sick_notes/' . $sick->doctor_note_path) }}" target="_blank">View Note</a>
              @else
                No File
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @else
      <p class="text-muted">No sick leave records available for this employee.</p>
    @endif
  </div>
</div>

        <!-- /.row -->
<div class="card mt-4">
  <div class="card-header">
    <h3 class="card-title">Leave History</h3>
  </div>
  <div class="card-body">
    @if($getRecord->leaves->count() > 0)
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Leave Type</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Days</th>
            <th>Description</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach($getRecord->leaves as $leave)
          <tr>
             <th>{{ $loop->iteration }}</th>
             <td>{{$leave->leavetypes->name}}</td>
            <td>{{ \Carbon\Carbon::parse($leave->start_date)->format('d M Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($leave->end_date)->format('d M Y') }}</td>
            <td>{{ $leave->number_of_days }}</td>
            <td>{{ $leave->message }}</td>
            
              <td>
                @if(ucfirst($leave->status == 0))
                          Approved
                  @elseif(ucfirst($leave->status == 1))
                      Rejected
                          @else
                          Pending
                  @endif
                </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @else
      <p class="text-muted">No leave records available for this employee.</p>
    @endif
  </div>
</div>



<div class="card mt-4">
  <div class="card-header">
    <h3 class="card-title">Disciplinary Action History</h3>
  </div>
  <div class="card-body">
    @if($getRecord->actions->count() > 0)
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Action Type</th>
            <th>Disciplinary Date</th>
            <!-- <th>End Date</th> -->
           
            <th>Description</th>
           
          </tr>
        </thead>
        <tbody>
          @foreach($getRecord->actions as $actions)
          <tr>
             <th>{{ $loop->iteration }}</th>
             <td>{{$actions->typess->name}}</td>
            <td>{{ \Carbon\Carbon::parse($actions->start_date)->format('d M Y') }}</td>
            <!-- <td>{{ \Carbon\Carbon::parse($actions->end_date)->format('d M Y') }}</td> -->
          
            <td>{{ $actions->message }}</td>
            
            
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @else
      <p class="text-muted">No Disciplinary records available for this employee.</p>
    @endif
  </div>
</div>

      </div><!-- /.container-fluid -->
    </section>
    
    <!-- /.content -->
  </div>
  <!-- /.footer -->


  <!-- Control Sidebar -->
  @endsection

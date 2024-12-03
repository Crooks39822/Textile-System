

@extends('backend.layouts.app')

@section('content')

    <div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Dashboard</h1>
          </div>

        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">

        <div class="row">
          




          <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $TotalStudent }}</h3>

                <p>Total Employees</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('admin/employee') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- <div class="col-lg-3 col-6">

<div class="small-box bg-warning">
  <div class="inner">
    <h3>{{ $TotalQC }}</h3>

    <p>Total QCs</p>
  </div>
  <div class="icon">
    <i class="ion ion-person-add"></i>
  </div>
  <a href="{{ url('admin/qc') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div> -->
          <div class="col-lg-3 col-6">

            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{ $TotalTeacher }}</h3>

                <p>Total Supervisors</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('admin/supervisor') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
      @if(Auth::user()->parent_id == 2)
         
          <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $TotalAdmin }}</h3>

                <p>Total Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('admin/users') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          @endif
          <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $TotalStaff }}</h3>

                <p>Total Admin Staff</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('admin/staff') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          

            
          <div class="col-lg-3 col-6">

            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{ $TotalClass }}</h3>

                <p>Total Departments</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-table"></i>
              </div>
              <a href="{{ url('admin/department') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         

        </div>
        

        <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title"><b>Probation End For This Month </b></h3>
                
              </div>
              <div class="card-body table-responsive p-0" style="overflow: auto;">
              <table class="table table-hover text-nowrap">
                
                  <thead>
                  <tr>
                  
                    <th>Name</th>
                    <th>Employemnt</th>
                    <th>Rate</th>
                    
                    <th>Clock Number</th>
                    <th>Join Date</th>
                    <th>Probation Date</th>
                     </tr>
                  </thead>
                  <tbody>
                  @forelse($usersThisMonth as $value)

                  <tr>
                  
                    <td>
                       @if(!empty($value->getProfileDirectory()))
                        <img src="{{$value->getProfileDirectory()}}" style="width: 30px;height: 30px; border-radius: 50px;"  class="mr-2">
                        @endif
                      {{$value->name}} {{$value->last_name}}
                    </td>
                    <td> @if($value->is_role == 1)
                                  Admin
                          @elseif($value->is_role == 2)
                                  Supervisor
                           @elseif($value->is_role == 3)
                                  Textile Employee
                                  @elseif($value->is_role == 5)
                                  Admin Staff
                          @endif</td>
                          <td>{{$value->roll_number}}</td>
                          <!--<td>{{$value->occupation}}</td>-->
                          
                          <td>{{$value->admission_number}}</td>
                          <td>{{ date('d-m-Y',strtotime($value->admission_date ))}}</td>
                          <td>{{ date('d-m-Y',strtotime($value->probation_date ))}}</td>
                    
                        
                  </tr>
                  
                  
                  @empty

                    <tr>
                    <td colspan="100%"> No Probation End For This Month.</td>
                    </tr>

@endforelse
                  </tbody>
                </table>
              </div>
            </div>
      </div>
      
    </section>

  </div>




  @endsection

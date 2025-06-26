

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
              <a href="{{ url('admin/employee/0') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">

          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $getExited }}</h3>

              <p>Total Exited</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="{{ url('admin/employee/2') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
          </div>
          <div class="col-lg-3 col-6">

            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{ $TotalTeacher }}</h3>

                <p>Total Supervisors</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('admin/supervisor/0') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
      @if(Auth::user()->parent_id == 2)
         
          <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $TotalAdmin }}</h3>

                <p>Total System Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('admin/users') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          @endif
          <div class="col-lg-3 col-6">

            <div class="small-box bg-primary">
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

            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $TotalClass }}</h3>

                <p>Total Departments/Lines</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-table"></i>
              </div>
              <a href="{{ url('admin/department') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
  <div class="small-box bg-maroon">
    <div class="inner">
      <h3>{{ $consecutiveAbsentees }}</h3>
      <p>Absent ≥ 3 Consecutive Days</p>
    </div>
    <div class="icon">
      <i class="fas fa-user-times"></i>
    </div>
    <!-- <a href="{{ url('admin/consecutive-absentees-report') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
  </div>
</div>
         

        </div>
        

<!-- start -->
 <div class="row">
  <div class="col-md-6">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Employee Attendance (Today)</h3>
      </div>
      <div class="card-body">
        <canvas id="attendanceStatusChart" style="min-height: 250px; height: 250px;"></canvas>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card card-info">
  <div class="card-header">
    <h3 class="card-title"><b>Absent Employees Today ({{ \Carbon\Carbon::today()->format('d-m-Y') }})</b></h3>
  </div>
</div>
  <div class="card-body table-responsive p-0" style="max-height: 300px; overflow-y:auto;">
    <table class="table table-hover text-nowrap">
      <thead>
        <tr>
          <th>Name</th>
          <th>Employee Number</th>
          <th>Department</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($absentEmployees as $employee)
        <tr>
          <td>{{ $employee->name }} {{ $employee->last_name }}</td>
          <td>{{ $employee->admission_number }}</td>
          <td>{{ $employee->user_line->name ?? 'N/A' }}</td>
        </tr>
        @empty
        <tr>
          <td colspan="3">All employees are present today.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

</div>

<div class="row">
          <div class="col-lg-6">
           <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Employees Employed per Month List</h3>
                  <select class="form-control ChangeYear" style="width:100px;">

                @for($i=2022; $i<=date('Y'); $i++)
               <option {{ ($year == $i) ? 'selected' : '' }} value="{{ $i }}"> {{ $i }} </option>
                @endfor
                </select>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                </div>
                <div class="position-relative mb-4">
                  <canvas id="sales-chart-oder" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                </div>
              </div>
              
            <!-- /.card -->

           
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Gender</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
               <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            <!-- /.card -->

            
          </div>
          <!-- /.col-md-6 -->
        </div>


<!-- end -->



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
                    <th>Employee Number</th>
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
                                  Supervisor/Leader
                           @elseif($value->is_role == 3)
                                   Employee
                                  @elseif($value->is_role == 5)
                                  Admin Staff
                          @endif</td>
                          <td>E {{$value->roll_number}}</td>
                          <!--<td>{{$value->occupation}}</td>-->
                          
                          <td>  
                          
                           @if($value->is_role == 2)
                                  {{$value->admission_number}}
                          @elseif($value->is_role == 3)
                                  {{$value->admission_number}} 
                           
                                  @elseif($value->is_role == 5)
                                  {{$value->admission_number}}
                          @endif
                          
                          </td>
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
      </div>
        </div>

        
      
    </section>

  




 @endsection
  @section('script')
  
  <script type="text/javascript">
 /* global Chart:false */
  $('.ChangeYear').change(function(){

  var year = $(this).val();
  window.location.href = "{{url('admin/dashboard?year=')}}"+year;
  });
  




var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode = 'index'
  var intersect = true

  var $salesChart = $('#sales-chart-oder')
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart($salesChart, {
    type: 'bar',
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [
        {
          backgroundColor: '#007bff',
          borderColor: '#007bff',
          data: [{{$TotalCustomer}}]
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value) {
              if (value >= 1000) {
                value /= 1000
                value 
              }

              return value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
  })
  var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Male',
          'Female',
          'Other',
      ],
      datasets: [
        {
          data: [{{$getTotalGenderM}},{{$getTotalGenderF}},{{$getTotalGenderO}}],
          backgroundColor : ['#f56954', '#00a65a','#f39c12',],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
     new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

// lgtm [js/unused-local-variable]
var attendanceStatusCtx = $('#attendanceStatusChart').get(0).getContext('2d');

var attendanceData = {
  labels: ['Present', 'Absent'],
  datasets: [{
    data: [{{ $presentToday }}, {{ $absentToday }}],
    backgroundColor: ['#28a745', '#dc3545'],
  }]
};

var attendanceOptions = {
  maintainAspectRatio: false,
  responsive: true,
};

new Chart(attendanceStatusCtx, {
  type: 'doughnut',
  data: attendanceData,
  options: attendanceOptions
});

      
</script>
@endsection
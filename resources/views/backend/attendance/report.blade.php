

@extends('backend.layouts.app')

@section('content')

  <div class="content-wrapper">
        <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Biometric Attendance Report <span style="color: blue;"></span></h1>
          </div>
           @if(Auth::user()->parent_id == 2)
    <div class="col-sm-6" style="text-align:right;">
                <a href="{{url('admin/attendance/manual-attendance')}}" class="btn btn-primary mb-2">Attendance Request</a>
              </div><!-- /.col -->

              @endif
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
           <div class="card-header">
            <h3 class="card-title">Search Biometric Attendance Report</h3>
                 </div>

                 <form method="GET" class="row g-3 mb-4">
                  <div class="card-body">
                    <div class="row">
                   <div class="col-md-2">
                        <label>From Date</label>
                        <input type="date" name="from" value="{{ $from }}" class="form-control">
                    </div>
                     <div class="col-md-2">
                        <label>To Date</label>
                        <input type="date" name="to" value="{{ $to }}" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label>Clock No</label>
                        <input type="text" name="employee" value="{{ request('employee') }}" class="form-control">
                    </div>
                   <div class="col-md-6 mt-4 d-flex align-items-end gap-1">
                        <button type="submit" class="btn btn-primary">Search</button>&nbsp;&nbsp;
                        <a href="{{ url('admin/attendance/export/pdf?from=' . $from . '&to=' . $to . '&employee=' . $employee) }}" class="btn btn-danger">Export PDF</a>

                        <a href="{{ route('attendance.export', ['from' => $from, 'to' => $to, 'employee' => $employee]) }}" class="btn btn-success">Export Excel</a>&nbsp;
                         <a href="{{ url('attendance-report')}}" class="btn btn-warning">Clear</a>&nbsp; 
                         <!-- <a href="{{ route('sync.local') }}" class="btn btn-success">Online Sync</a>&nbsp; -->
                        <!-- <button type="button" onclick="startSync()" class="btn btn-primary">Sync  Device</button> -->
                     
                        
                    </div>

                    
                     </div>
                      </div>
                </form>

            

                   
           </div>

            @include('_message')
           <div class="card">
            <div class="card-header">

            <h3 class="card-title">Biometric Attendance List</h3>
            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
<table class="table table-hover text-nowrap">
                    <thead>
                      <tr>

                         <th>Employee</th>
                        <th>Date</th>
                        <th>Day</th>
                        <th>Check-In</th>
                        <th>Check-Out</th>
                        <th>Worked Hours</th>
                        
                      </tr>
                    </thead>
                    <tbody>
           @foreach($grouped as $employeeData)
     <tr class="table-primary">
        <td colspan="6">
           <strong>{{ $employeeData['employee'] ?? 'Unknown' }} {{ $employeeData['last_name'] ?? '' }} - ({{ $employeeData['class_id'] ?? '' }})  </strong>

            
            <span>Total Hours: 
                {{ floor(($employeeData['total_minutes'] ?? 0) / 60) }}h 
                {{ ($employeeData['total_minutes'] ?? 0) % 60 }}m
            </span>

        </td>
    </tr>
    @foreach($employeeData['records'] as $attendance)
        <tr>
            <td>{{ $attendance->user->name ?? 'Unknown' }} ({{ $attendance->employee_number }})</td>
            <td>{{ $attendance->date }}</td>
            <td>{{ \Carbon\Carbon::parse($attendance->date)->format('l') }}</td>
            <td>{{ $attendance->check_in }}</td>
            <td>{{ $attendance->check_out ?? 'None' }}</td>
            <td>
    @php
        $workedMinutes = $attendance->worked_hours;
        $workedHours = floor($workedMinutes / 60);
        $workedRemainder = $workedMinutes % 60;

        $overtimeMinutes = $attendance->overtime_minutes;
        $overtimeHours = floor($overtimeMinutes / 60);
        $overtimeRemainder = $overtimeMinutes % 60;
    @endphp

    <strong>Total Worked:</strong> {{ $workedHours }}h {{ $workedRemainder }}m<br>
    
</td>

        </tr>
    @endforeach
@endforeach
<tr class="table-info">
    <td colspan="5" class="text-end"><strong>Grand Total</strong></td>
    <td>
        {{ floor($grandTotalMinutes / 60) }}h {{ $grandTotalMinutes % 60 }}m
    </td>
</tr>

            </tr>
        </tfoot>
    </table>
               

        </div>


    </div>


   </section>

  </div>
</div>
@endsection
@section('script')

<script type="text/javascript">


    function startSync() {
        if (confirm("Start syncing attendance from device?")) {
            const btn = event.target;
            btn.disabled = true;
            btn.innerHTML = 'Syncing...';

            window.location.href = "{{ route('zk.sync') }}";
        }
    }
</script>
 

@endsection




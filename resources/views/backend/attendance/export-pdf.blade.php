

@extends('backend.layouts.app')

@section('content')

  <div class="content-wrapper">
        <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Attendance Report <span style="color: blue;"></span></h1>
          </div>

        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          

            @include('_message')
           <div class="card">
            <div class="card-header">

            <h3 class="card-title">Attendance List</h3>
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
          
    
       
@foreach($records as $attendance)
     <tr class="table-primary">
        <td>{{ $attendance->user->name ?? 'Unknown' }}</td>
        <td>{{ $attendance->date }}</td>
        <td>{{ $attendance->check_in }}</td>
        <td>{{ $attendance->check_out }}</td>
        <!-- Add other columns -->
    </tr>
@endforeach

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


 </script>

@endsection




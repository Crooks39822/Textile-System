

@extends('backend.layouts.app')

@section('content')

  <div class="content-wrapper">
       <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Fees Collection</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">


        <div class="row">
          <div class="col-md-12">

           @include('_message')
           <div class="card">
            <div class="card-header">
            <h3 class="card-title">My Payment Details</h3>
            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
<table class="table table-hover text-nowrap">
                    <thead>
                      <tr>

                        <th >Class Name  </th>
                        <th >Total Amount </th>
                        <th >Paid Amount </th>
                        <th >Remaining Amount </th>
                        <th>Payment Type</th>
                        <th>Remarks</th>
                        <th>Created By</th>
                        <th>Created Date</th>

                      </tr>
                    </thead>
                    <tbody>
                        @forelse($getFees as $value)

                        <tr>

                           <td>{{ $value->class_name }}</td>
                           <td>E {{ number_format($value->total_amount,2)}}</td>

                           <td>E {{ number_format($value->paid_amount,2)}}</td>
                           <td>E {{ number_format($value->remaining_amount,2)}}</td>
                           <td>{{ $value->payment_type }}</td>
                           <td>{{ $value->remarks }}</td>
                           <td>{{ $value->created_by }}</td>

                           <td>{{ date('d-m-Y H:i A',strtotime($value->created_at ))}}</td>

                         </tr>
                         @empty

                         <tr>
                        <td colspan="100%"> No Record Found.</td>
                         </tr>
                         @endforelse
                    </tbody>
                  </table>
        </div>
    </div>
    </section>
  </div>
</div>

  @endsection

  @section('script')
        <script type="text/javascript">
       // $('#AddFees').click(function(){
           // $('#AddFeesModal').modal('show');
       // });
        </script>
@endsection



@extends('backend.layouts.app')

@section('content')

  <div class="content-wrapper">
       <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Fees Collection <span style="color:blue;">({{$getStudent->name}} {{$getStudent->last_name}})</span>  </h1>
          </div>
          <div class="col-sm-6" style="text-align:right;">
            <button type="button" class="btn btn-primary mb-2" id="AddFees">Add Fees</button>
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
            <h3 class="card-title"Payment Details</h3>
            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
                <table class="table table-striped">
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
<div class="modal fade" id="AddFeesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Fees</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="">
            @csrf
            <div class="form-group">
                <label  class="col-form-label">Class Name: <span style="color: blue;"> {{ $getStudent->class_name}}</span> </label>
             </div>
            <div class="form-group">
                <label  class="col-form-label">Total Amount: E {{ number_format($getStudent->amount,2)}}</label>
             </div>
             <div class="form-group">
                <label  class="col-form-label">Paid Amount: E {{ number_format($getPaidAmount,2)}}</label>
             </div>
             <div class="form-group">
                @php
                    $RemainingAmount = $getStudent->amount - $getPaidAmount;
                @endphp
                <label  class="col-form-label">Remaining Amount: E {{ number_format($RemainingAmount,2)}}</label>
             </div>
            <div class="form-group">
              <label  class="col-form-label">Amount:<span style="color: red;">*</span></label>
              <input type="number" class="form-control" name="paid_amount" required>
            </div>
            <div class="form-group">
                <label  class="col-form-label">Payment Type:<span style="color: red;">*</span></label>

                <select class="form-control" name="payment_type" required>
                    <option value="">Select Payment Type</option>
                    <option value="Cash">Cash</option>
                    <option value="Cheque">Cheque</option>
                    <option value="EFT">EFT</option>
                    <option value="Mobile Money">Mobile Money</option>


                    </select>
              </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Remarks:</label>
              <textarea class="form-control" name="remarks"></textarea>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  @endsection

  @section('script')
        <script type="text/javascript">
        $('#AddFees').click(function(){
            $('#AddFeesModal').modal('show');
        });
        </script>
@endsection



@extends('backend.layouts.app')

@section('content')


  <div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1> Fees Collection Report  </h1>
          </div>

        </div>
      </div>
    </div>


    <section class="content">
      <div class="container-fluid">


        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                 <h3 class="card-title">Search  Fees Collection Report</h3>
                      </div>
                 <form method="get" action="">
                     <div class="card-body">
                         <div class="row">

                         <div class="form-group col-md-2">
                                 <label>Student ID</label>
                                 <input type="text" class="form-control" name="id_number" value="{{ Request::get('id_number') }}"  placeholder="Student ID">
                             </div>
                         <div class="form-group col-md-2">
                                 <label>First Name</label>
                                 <input type="text" class="form-control" name="name" value="{{ Request::get('name') }}"  placeholder="Studen Name">
                             </div>
                             <div class="form-group col-md-2">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="last_name" value="{{ Request::get('last_name') }}"  placeholder="Studen Lastname">
                            </div>
                                 <div class="form-group col-md-2">
                                 <label>Class Name</label>
                                 <select class="form-control"  name="class_name">
                                     <option value="">Select Class</option>
                                     @foreach($getClass as $class)
                                     <option {{(Request::get('class_name') == $class->id) ? 'selected' : ''}} value="{{ $class->id }}"> {{ $class->name }} </option>
                                     @endforeach

                                     </select>
                             </div>

                             <div class="form-group col-md-2">
                                 <label> Start Created Date</label>
                                 <input type="date" class="form-control"  value="{{Request::get('start_created_date')}}"  name="start_created_date">

                             </div>
                             <div class="form-group col-md-2">
                                 <label> End Created Date</label>
                                 <input type="date" class="form-control"  value="{{Request::get('end_created_date')}}"  name="end_created_date">

                             </div>
                             <div class="form-group col-md-2">
                                <label>Payment Type</label>
                                <select class="form-control"  name="payment_type">
                                    <option value="">Select Type</option>

                                    <option {{(Request::get('payment_type') == 'Cash') ? 'selected' : ''}} value="Cash">Cash </option>
                                    <option {{(Request::get('payment_type') == 'Cheque') ? 'selected' : ''}} value="Cheque">Cheque </option>
                                    <option {{(Request::get('payment_type') == 'EFT') ? 'selected' : ''}} value="EFT">EFT </option>
                                    <option {{(Request::get('payment_type') == 'Mobile Money') ? 'selected' : ''}} value="Mobile Money"> Mobile Money </option>

                                    </select>
                            </div>


                             <div class="form-group col-md-2">
                            <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                            <a href="{{url('admin/fees_collection/collect_fees_repot')}}" class="btn btn-success" style="margin-top: 30px">Clear</a>
                             </div>

                         </div>

                     </div>

                 </form>
                </div>




           @include('_message')
           <div class="card">
            <div class="card-header">

            <h3 class="card-title">Fees Collection Report </h3>
            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
                <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th># </th>
                        <th >Student ID</th>
                        <th >Student Name</th>
                        <th >Class  </th>
                        <th >Total </th>
                        <th >Paid </th>
                        <th >Remaining </th>
                        <th >Payment Type </th>
                        <th >Remarks </th>
                        <th >Created By </th>
                        <th>Created Date</th>

                      </tr>
                    </thead>
                    <tbody>

                        @forelse($getRecord as $value)


                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $value->id_number }}</td>
                            <td>{{ $value->first_name }} {{ $value->last_name }}</td>
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
                      <div style="padding: 10px; float:right;">

                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

            </div>


        </div>
    </div>



    </section>

  </div>
</div>

  @endsection

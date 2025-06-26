@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <h3>Monthly Pass-Out Report</h3>

      <form method="GET" class="form-inline mb-4">
        <div class="form-group mr-2">
          <label for="month">Select Month:</label>
          <input type="month" name="month" value="{{ $month }}" class="form-control ml-2">
        </div>
        <div class="form-group mr-2">
          <label for="employee_id">Employee:</label>
          <select name="employee_id" class="form-control ml-2">
            <option value="">All</option>
            @foreach($employees as $emp)
              <option value="{{ $emp->id }}" {{ $employeeId == $emp->id ? 'selected' : '' }}>
                {{ $emp->name }} {{ $emp->last_name }}
              </option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
      </form>

      @forelse($summary as $data)
        <div class="card mb-4">
          <div class="card-header bg-light">
            <strong>{{ $data['employee']->name }} {{ $data['employee']->last_name }} - ({{ $data['employee']->admission_number }}) </strong>
          </div>
          <div class="card-body">
            <p><strong>Total Pass-Outs:</strong> {{ $data['count'] }}</p>
            <p><strong>Total Duration:</strong>
              @php
                $hours = floor($data['duration'] / 60);
                $mins = $data['duration'] % 60;
              @endphp
              {{ $hours }}h {{ $mins }}m
            </p>

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Time Out</th>
                  <th>Time In</th>
                  <th>Duration</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data['details'] as $record)
                  <tr>
                    <td>{{ \Carbon\Carbon::parse($record->time_out)->format('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($record->time_out)->format('H:i') }}</td>
                    <td>
                      @if($record->time_in)
                        {{ \Carbon\Carbon::parse($record->time_in)->format('H:i') }}
                      @else
                        <span class="text-warning">Pending</span>
                      @endif
                    </td>
                    <td>
                      @if($record->time_in)
                        @php
                          $mins = \Carbon\Carbon::parse($record->time_out)->diffInMinutes($record->time_in);
                          echo floor($mins / 60) . 'h ' . ($mins % 60) . 'm';
                        @endphp
                      @else
                        —
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>

          </div>
        </div>
      @empty
        <div class="alert alert-info">No pass-outs found for this month.</div>
      @endforelse

    </div>
  </section>
</div>
@endsection

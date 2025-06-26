@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <h3 class="mb-4">Today's Pass-Outs</h3>

      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Employee</th>
            <th>Time Out</th>
            <th>Time In</th>
            <th>Status</th>
            <th>Duration</th>
          </tr>
        </thead>
        <tbody>
          @forelse($passOuts as $record)
            <tr>
              <td>{{ $record->employee->name }} {{ $record->employee->last_name }}</td>
              <td>{{ \Carbon\Carbon::parse($record->time_out)->format('d M Y H:i') }}</td>
              <td>
                @if($record->status === 'pending')
                  <form method="POST" action="{{ url('passout/return', $record->id) }}">
                    @csrf
                    @method('PUT')
                    <input type="datetime-local" name="time_in" class="form-control" required>
                    <button type="submit" class="btn btn-sm btn-primary mt-2">Mark Returned</button>
                  </form>
                @else
                  {{ \Carbon\Carbon::parse($record->time_in)->format('d M Y H:i') }}
                @endif
              </td>
              <td>
                <span class="badge badge-{{ $record->status == 'pending' ? 'warning' : 'success' }}">
                  {{ ucfirst($record->status) }}
                </span>
              </td>
              <td>
                @if($record->status == 'returned')
                  @php
                    $duration = \Carbon\Carbon::parse($record->time_out)->diffInMinutes($record->time_in);
                    echo floor($duration / 60) . 'h ' . ($duration % 60) . 'm';
                  @endphp
                @else
                  —
                @endif
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center text-muted">No pass-outs recorded today.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </section>
</div>
@endsection

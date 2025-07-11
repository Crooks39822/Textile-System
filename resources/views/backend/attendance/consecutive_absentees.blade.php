@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <h1 class="m-3">Employees Absent ≥ 3 Consecutive Days</h1>
    </div>
    <section class="content">
        <div class="container-fluid">
            @if(count($absenteeList) > 0)
                <div class="card">
                    <div class="card-body table-responsive">
                      <table border="1" cellpadding="6" cellspacing="0">
    <thead>
        <tr>
            <th>Employee Name</th>
            <th>Employee Number</th>
            <th>Department</th>
            <th>Absent Streaks</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($absenteeList as $absentee)
            <tr>
                <td> ⛔{{ $absentee['employee'] }}</td>
                <td>{{ $absentee['employee_number'] }}✅</td>
                <td>{{ $absentee['department'] }}</td>
                <td>
                    <ul style="padding-left: 18px;">
                        @foreach ($absentee['streaks'] as $streak)
                            <li>{{ implode(' ❌ ', $streak) }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

                    </div>
                </div>
            @else
                <p class="text-muted">No employees were absent for 3 or more consecutive working days this month.</p>
            @endif
        </div>
    </section>
</div>
@endsection

<!DOCTYPE html>
<html>
<head>
    <title>Attendance Report</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ccc; padding: 4px; text-align: left; }
        .header { background-color: #f2f2f2; font-weight: bold; }
    </style>
</head>
<body>

    <h2>Biometric Attendance Report</h2>
    <p><strong>From:</strong> {{ $from }} | <strong>To:</strong> {{ $to }}</p>

    @foreach($grouped as $employeeData)
        <table>
            <tr class="header">
                <td colspan="6">
                    <strong>{{ $employeeData['employee'] }} {{ $employeeData['last_name'] }} - ({{ $employeeData['class_id'] }})</strong><br>
                    Total Hours: {{ floor($employeeData['total_minutes'] / 60) }}h {{ $employeeData['total_minutes'] % 60 }}m
                </td>
            </tr>
            <tr>
                <th>Employee</th>
                <th>Date</th>
                <th>Day</th>
                <th>Check-In</th>
                <th>Check-Out</th>
                <th>Worked Hours</th>
            </tr>
            @foreach($employeeData['records'] as $attendance)
                @php
                    $worked = $attendance->worked_hours;
                @endphp
                <tr>
                    <td>{{ $attendance->user->name ?? 'Unknown' }} ({{ $attendance->employee_number }})</td>
                    <td>{{ $attendance->date }}</td>
                    <td>{{ \Carbon\Carbon::parse($attendance->date)->format('l') }}</td>
                    <td>{{ $attendance->check_in }}</td>
                    <td>{{ $attendance->check_out ?? 'None' }}</td>
                    <td>{{ floor($worked / 60) }}h {{ $worked % 60 }}m</td>
                </tr>
            @endforeach
        </table>
    @endforeach

    <p><strong>Grand Total:</strong> {{ floor($grandTotalMinutes / 60) }}h {{ $grandTotalMinutes % 60 }}m</p>

</body>
</html>

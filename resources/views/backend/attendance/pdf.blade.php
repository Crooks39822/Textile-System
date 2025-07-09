<!DOCTYPE html>
<html>
<head>
    <title>Attendance Report</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 10px; }
        th, td { border: 1px solid #ccc; padding: 6px; text-align: left; }
        .header { background-color: #f2f2f2; font-weight: bold; }
        .highlight { background-color: #ffe6e6; }
        .summary { margin-bottom: 5px; font-weight: bold; }
        .signature { margin-top: 30px; margin-bottom: 50px; }
        .signature-line { margin-top: 5px; }
    </style>
</head>
<body>

    <h2>Biometric Attendance Report</h2>
    <p><strong>From:</strong> {{ $from }} &nbsp; | &nbsp; <strong>To:</strong> {{ $to }}</p>

    @php
        $grandTotalOvertimeMinutes = 0;
    @endphp

    @foreach($grouped as $employeeData)
        @php
            $employeeOvertimeMinutes = $employeeData['records']->sum('overtime_minutes');
            $grandTotalOvertimeMinutes += $employeeOvertimeMinutes;
            $workedTotal = $employeeData['total_minutes'];
        @endphp

        <!-- Summary Block -->
        <div class="summary">
            {{ $employeeData['employee'] }} {{ $employeeData['last_name'] }} ({{ $employeeData['class_id'] }}) &nbsp; |
            Total Worked: {{ floor($workedTotal / 60) }}h {{ $workedTotal % 60 }}m &nbsp; |
            Overtime: {{ floor($employeeOvertimeMinutes / 60) }}h {{ $employeeOvertimeMinutes % 60 }}m
        </div>

        <table>
            <tr class="header">
                <th>Employee</th>
                <th>Date</th>
                <th>Day</th>
                <th>Check-In</th>
                <th>Check-Out</th>
                <th>Worked Hours</th>
                <th>Overtime</th>
            </tr>
            @foreach($employeeData['records'] as $attendance)
                @php
                    $worked = $attendance->worked_hours;
                    $overtime = $attendance->overtime_minutes;
                    $highlightRow = $overtime > 120;
                @endphp
                <tr class="{{ $highlightRow ? 'highlight' : '' }}">
                    <td>{{ $attendance->user->name ?? 'Unknown' }} ({{ $attendance->employee_number }})</td>
                    <td>{{ $attendance->date }}</td>
                    <td>{{ \Carbon\Carbon::parse($attendance->date)->format('l') }}</td>
                    <td>{{ $attendance->check_in }}</td>
                    <td>{{ $attendance->check_out ?? 'None' }}</td>
                    <td>{{ floor($worked / 60) }}h {{ $worked % 60 }}m</td>
                    <td>
                        {{ floor($overtime / 60) }}h {{ $overtime % 60 }}m
                        @if($highlightRow)
                            <strong style="color: red;">(Over 2h!)</strong>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>

        <!-- Signatures -->
        <div class="signature">
            <div class="signature-line">
                <strong>Employee Signature:</strong> ____________________________ &nbsp;&nbsp;
            
            </div>
            <div class="signature-line" style="margin-top: 10px;">
                <strong>Payroll Signature:</strong> ____________________________ &nbsp;&nbsp;
            
            </div>
             <div class="signature-line" style="margin-top: 10px;">
                <strong>HR Signature:</strong> ____________________________ &nbsp;&nbsp;
                <strong>Date:</strong> ________________
            </div>
        </div>

    @endforeach

    <p style="font-weight: bold;">
        Grand Total Worked: {{ floor($grandTotalMinutes / 60) }}h {{ $grandTotalMinutes % 60 }}m <br>
        Grand Total Overtime: {{ floor($grandTotalOvertimeMinutes / 60) }}h {{ $grandTotalOvertimeMinutes % 60 }}m
    </p>

</body>
</html>

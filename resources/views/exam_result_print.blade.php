<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title> Print Exam Result</title>
<style type="text/css">
@page{
	size: 8.3in 11.7in;
}
@page{
	size: A4;
}

.margin-bottom
{
	border-bottom:3px;
}
.table-bg{
	
	border-collapse: collapse;
	width:100%;
	font-size: 15px;
	text-align:center;
}
.th{
	border:1px solid #000;
	padding:10px;
}
.text-container{
	text-align:left;
	padding-left:5px;
}

.td{
border:1px solid #000;
	padding:3px;	
}

@media print{
	@page{
	margin: 0px;
	margin-left: 20px;
	margin-right: 20px;
	}
}
</style>
</head>
<body>

<div id="page">
<table style="width: 100%; text-align: center;">
<tr>
<td width="5%"></td>
<td width="15%"><img style="width:110px;" src="{{$getSetting->getLogo()}}"></td>
<td align="left">
<h1> {!! $getSetting->name !!}</h1>
</td>
</tr>
</table>
<table style="width:100%;">
<tr>
<td width="5%"></td>
<td width="70%">

<table class="margin-buttom" style="width:100%">
<tbody>

<tr>
<td width="27%">Name Of Student :</td>
<td style="border-bottom:1px solid; width: 100%;">{{$getStudent->name}} {{$getStudent->last_name}}</td>
</tr>
</tbody>

</table>
<table class="margin-buttom" style="width:100%">
<tbody>

<tr>
<td width="23%">Admission Number :</td>
<td style="border-bottom:1px solid; width: 100%;">{{$getStudent->admission_number}}</td>
</tr>
</tbody>

</table>
<table class="margin-buttom" style="width:100%">
<tbody>

<tr>
<td width="23%">Class :</td>
<td style="border-bottom:1px solid; width: 100%;">{{$getClass->class_name}}</td>
</tr>
</tbody>

</table>
<table class="margin-buttom" style="width:100%">
<tbody>

<tr>
<td width="30%">Academic Year :</td>
<td style="border-bottom:1px solid; width: 20%;">{{$getAcademicYaer->academic_year}}</td>
<td width="11%">Term:</td>
<td style="border-bottom:1px solid; width: 80%;">{{$getExam->name}}</td>
</tr>
</tbody>

</table>

</td>
<td width="5%"></td>
<td width="20%" valign="top">
<img src="{{$getStudent->getProfileDirectory()}}" style="border-radius: 6px; width:100px; height:100px" >
<br>
Gender: {{$getStudent->gender}}
</td>
</tr>

</table>
<br>
<div>
<table class="table-bg">
                    <thead>
                      <tr>

                        <th class="th" style="text-align:left;">Subject</th>
                        <th class="th">Test 1 Mark</th>
                        <th class="th">Test 2 Mark</th>
                        <th class="th">Assignment Mark</th>
                        <th class="th">Exam Mark</th>
                        <th class="th">TOTAL MARKS SCORE</th>
                       <th class="th">FULL MARKS</th>
                        <th class="th">PASSING MARK</th>
                        <th class="th">RESULT</th>

                      </tr>
                    </thead>
                    <tbody>
                        @php
                        $total_score = 0;
                        $full_marks = 0;
                        $pass_fail_validation = 0;
                        @endphp
                        @foreach ($getExamMarks as  $exam)
                        @php
                        $total_score = $total_score + $exam['total_score'];
                        $full_marks = $full_marks + $exam['full_marks'];

                         @endphp
                        <tr>

                            <td class="td" style="width: 300px; text-align:left;" >{{ $exam['subject_name'] }}</td>
                            <td class="td" >{{ $exam['test_1_mark'] }}</td>
                            <td class="td">{{ $exam['test_2_mark'] }}</td>
                            <td class="td">{{ $exam['project_mark'] }}</td>
                            <td class="td">{{ $exam['exam_mark'] }}</td>
                            <td class="td" style="font-weight:bold">{{ $exam['total_score'] }}</td>
                            <td class="td" style="font-weight:bold">{{ $exam['full_marks'] }}</td>
                            <td class="td" style="font-weight:bold">{{ $exam['passing_mark'] }}</td>
                            <td class="td">
                            @if($exam['total_score'] >= $exam['passing_mark'])
                            <span  style="color: green; font-weight: bold">Pass</span>
                             @else
                            <span  style="color: red; font-weight: bold">Fail</span>
                            @php
                                $pass_fail_validation = 1;
                             @endphp
                             @endif
                            </td>
                          </tr>

                          @endforeach
                          <tr>

                            <td class="td" colspan="2"><b>Grand Total: {{ $total_score }} / {{ $full_marks }}</b></td>
                            @php
                            $percent =($total_score * 100)/ $full_marks;
                            $getGrade = App\Models\MarksGrade::getGrade($percent);
                            $getComment = App\Models\MarksGrade::getComment($percent);
                            @endphp
                            <td class="td" colspan="2"><b>Percent: {{ round($percent,2)}}%</b></td>
                            <td class="td" colspan="2"><b>Grade:  @if(!empty($getGrade))
                               <b> Grade : </b>{{$getGrade}} <br>
                               @endif</b></td>
                            <td class="td" colspan="3"><b>Result:   @if($pass_fail_validation == 0)
                                Result: <span style="color: green; font-weight: bold">Pass</span>
                                @else
                                Result: <span style="color: red; font-weight: bold">Fail</span>
                                @endif</b>
                        </td>
                             </tr>
                    </tbody>
                  </table>
            </div>
            <table class="margin-buttom" style="width:100%">
            <tbody>

            <tr>
            <td width="15%">Comments:</td>
            <td style="border-bottom:1px solid; width: 100%;">@if(!empty($getComment))
                               {{$getComment}}
                               @endif
          
          </td>
            </tr>
            </tbody>

            </table>
            <div>
            {!!$getSetting->exam_description!!}
            
            </div></br>
            <table class="margin-buttom" style="width:100%">
            <tbody>

            <tr>
            <td width="15%">Signature:</td>
            <td style="border-bottom:1px solid; width: 100%;"></td>
            </tr>
            </tbody>

            </table>
            </div>
            <script type="text/javascript">
            window.print();
            </script>
</body>
</html>
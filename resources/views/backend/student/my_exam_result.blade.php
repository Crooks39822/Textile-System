

@extends('backend.layouts.app')

@section('content')


  <div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Exam Result  </h1>
          </div>

        </div>
      </div>
    </div>
   <section class="content">
      <div class="container-fluid">
        <div class="row">
            @foreach ($getRecord as  $value)


           <div class="col-md-12">
           <div class="card">
            <div class="card-header">

            <h3 class="card-title">{{ $value['exam_name'] }}</h3>
            @foreach($getFees as $fees)
            @if($fees->remaining_amount <=0)
            <a class="btn btn-primary btn-sm float" style="float:right;" target="_blank" href="{{url('student/my_exam_result/print?exam_id='.$value['exam_id'].'&student_id='
              .Auth::user()->id)}}">Print </a>
              @else
             

            @endif
            @endforeach
            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
            <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>

                        <th>Subject</th>
                        <th >Test 1 Mark</th>
                        <th >Test 2 Mark</th>
                        <th >Assignment Mark</th>
                        <th >Exam Mark</th>
                        <th >TOTAL MARKS SCORE</th>
                       <b> <th >FULL MARKS</th>
                        <th >PASSING MARK</th></b>
                        <th >RESULT</th></b>

                      </tr>
                    </thead>
                    <tbody>
                        @php
                        $total_score = 0;
                        $full_marks = 0;
                        $pass_fail_validation = 0;
                        @endphp
                        @foreach ($value['subjects'] as  $exam)
                        @php
                        $total_score = $total_score + $exam['total_score'];
                        $full_marks = $full_marks + $exam['full_marks'];

                         @endphp
                        <tr>

                            <td style="width: 300px" >{{ $exam['subject_name'] }}</td>
                            <td >{{ $exam['test_1_mark'] }}</td>
                            <td >{{ $exam['test_2_mark'] }}</td>
                            <td >{{ $exam['project_mark'] }}</td>
                            <td >{{ $exam['exam_mark'] }}</td>
                            <td style="font-weight:bold">{{ $exam['total_score'] }}</td>
                            <td style="font-weight:bold">{{ $exam['full_marks'] }}</td>
                            <td style="font-weight:bold">{{ $exam['passing_mark'] }}</td>
                            <td>
                            @if($exam['total_score'] >= $exam['passing_mark'])
                            <span style="color: green; font-weight: bold">Pass</span>
                             @else
                            <span style="color: red; font-weight: bold">Fail</span>
                            @php
                                $pass_fail_validation = 1;
                             @endphp
                             @endif
                            </td>
                          </tr>

                          @endforeach
                          <tr>

                            <td colspan="2"><b>Grand Total: {{ $total_score }} / {{ $full_marks }}</b></td>
                            @php
                            $percent =($total_score * 100)/ $full_marks;
                            $getGrade = App\Models\MarksGrade::getGrade($percent);
                            @endphp
                            <td colspan="2"><b>Percent: {{ round($percent,2)}}%</b></td>
                            <td colspan="2"><b>Grade:  @if(!empty($getGrade))
                               <b> Grade : </b>{{$getGrade}} <br>
                               @endif</b></td>
                            <td colspan="3"><b>Result:   @if($pass_fail_validation == 0)
                                Result: <span style="color: green; font-weight: bold">Pass</span>
                                @else
                                Result: <span style="color: red; font-weight: bold">Fail</span>
                                @endif</b>
                        </td>
                             </tr>
                    </tbody>
                  </table>

            <div style="padding: 10px; float:right;">

        </div>

        </div>
    </div>
    @endforeach
           </div>
        </div>
    </section>

</div>
  @endsection

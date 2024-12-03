

@extends('backend.layouts.app')

@section('content')

  <div class="content-wrapper">
        <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Marks Register</h1>
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
            <h3 class="card-title">Search Marks Register</h3>
                 </div>
            <form method="get" action="">
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-3">
                            <label>Exam Name</label>
                            <select class="form-control" name="exam_id" required>
                                <option value="">Select Class</option>
                                @foreach($getExam as $exam)
                                <option {{(Request::get('exam_id') == $exam->exam_id) ? 'selected' : ''}} value="{{ $exam->exam_id }}"> {{ $exam->exam_name }} </option>
                                @endforeach

                                </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label>Class Name</label>
                            <select class="form-control getClass" name="class_id" required>
                                <option value="">Select Class</option>
                                @foreach($getClass as $class)
                                <option {{(Request::get('class_id') == $class->class_id) ? 'selected' : ''}} value="{{ $class->class_id }}"> {{ $class->class_name }} </option>
                                @endforeach

                                </select>
                        </div>
                        <div class="form-group col-md-3">
                       <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                       <a href="{{url('admin/examination/marks_register')}}" class="btn btn-success" style="margin-top: 30px">Clear</a>
                        </div>

                    </div>

                </div>

            </form>
           </div>

           @if(!empty($getSubject) && !empty($getSubject->count()))

            @include('_message')
           <div class="card">
            <div class="card-header">

            <h3 class="card-title">Marks Register List</h3>
            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
            <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>

                         <th>STUDENT NAME</th>
                         @foreach ($getSubject  as $subject)
                         <th>
                            {{ $subject->subject_name }}<br/>
                            ({{ $subject->subject_type }}: {{ $subject->passing_mark }} / {{ $subject->full_marks }})<br/>

                         </th>
                         @endforeach

                        <th>ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if(!empty($getStudent) && !empty($getStudent->count()))
                        @foreach ($getStudent  as $student)
                        <form method="post"  class="SubmitForm">
                            @csrf
                            <input type="hidden" name="student_id" value="{{$student->id}}">
                            <input type="hidden" name="class_id" value="{{Request::get('class_id')}}">
                            <input type="hidden" name="exam_id" value="{{Request::get('exam_id')}}">

                        <tr>

                            <td>{{ $student->name }} {{ $student->last_name }}</td>
                            @php
                            $i = 1;
                            $totalStudentMark = 0;
                            $totalFullMark = 0;
                            $totalPassingMark = 0;
                            $pass_fail_validation = 0;
                            @endphp
                            @foreach($getSubject  as $subject)
                            @php
                            $totalMark = 0;
                            $totalFullMark = $totalFullMark + $subject->full_marks;
                            $totalPassingMark =  $totalPassingMark + $subject->passing_mark;
                            $getMark = $subject->getMark($student->id,Request::get('class_id'),Request::get('exam_id'),$subject->subject_id);
                            if(!empty($getMark))
                            {
                                $totalMark = $getMark->test_1_mark + $getMark->test_2_mark + $getMark->project_mark + $getMark->exam_mark ;
                                $totalStudentMark =  $totalStudentMark + $totalMark;
                            }
                            @endphp
                            <td>
                                <div style="margin-bottom: 10px">
                            Test (1) Mark
                            <input type="hidden" name="mark[{{$i}}][full_marks]" value="{{ $subject->full_marks}}">
                            <input type="hidden" name="mark[{{$i}}][passing_mark]" value="{{ $subject->passing_mark}}">
                            <input type="hidden" name="mark[{{$i}}][id]" value="{{ $subject->id}}">
                            <input type="hidden" name="mark[{{$i}}][subject_id]" value="{{ $subject->subject_id}}">

                        <input type="text" name="mark[{{$i}}][test_1_mark]" class="form-control" placeholder="Enter Marks" style="width:200px;"
                        value="{{ !empty($getMark->test_1_mark) ? $getMark->test_1_mark : ''}}" id="test_1_mark_{{$student->id}}{{$subject->subject_id}}">
                            </div>
                            <div style="margin-bottom: 10px">
                             Test( 2 ) Mark
                         <input type="text" name="mark[{{$i}}][test_2_mark]" class="form-control" placeholder="Enter Marks" style="width:200px;"
                         value="{{ !empty($getMark->test_2_mark) ? $getMark->test_2_mark : ''}}" id="test_2_mark_{{$student->id}}{{$subject->subject_id}}">
                             </div>
                             <div style="margin-bottom: 10px">
                                  Project Mark
                                <input type="text" name="mark[{{$i}}][project_mark]" class="form-control" placeholder="Enter Marks" style="width:200px;"
                                value="{{ !empty($getMark->project_mark) ? $getMark->project_mark : ''}}" id="project_mark_{{$student->id}}{{$subject->subject_id}}">
                             </div>
                             <div style="margin-bottom: 10px">
                                Exam Mark
                              <input type="text" name="mark[{{$i}}][exam_mark]" class="form-control" placeholder="Enter Marks" style="width:200px;"
                              value="{{ !empty($getMark->exam_mark) ? $getMark->exam_mark : ''}}" id="exam_mark_{{$student->id}}{{$subject->subject_id}}">
                           </div>
                           <div style="margin-bottom: 10px">
                            <button type="button" class="btn btn-primary SaveSingleSubject" id="{{$student->id}}"
                                data-val="{{$subject->subject_id}}" data-exam="{{Request::get('exam_id')}}"
                                data-schedule="{{$subject->id}}" data-class="{{Request::get('class_id')}}"> Save </button>
                       </div>
                       @if(!empty($getMark))
                       <div style="margin-bottom: 10px">
                      <b> Total Marks :</b> {{ $totalMark  }}<br>
                       <b>Passing Marks :</b> {{ $subject->passing_mark }}<br>
                       @php
                       $getLoopGrade = App\Models\MarksGrade::getGrade($totalMark);
                       @endphp

                       @if(!empty($getLoopGrade))
                       <b>Grade :</b> {{ $getLoopGrade }}<br>
                       @endif
                       @if($totalMark >=  $subject->passing_mark )
                       Result: <span style="color: green; font-weight: bold">Pass</span>
                       @else
                       Result: <span style="color: red; font-weight: bold">Fail</span>
                       @php
                       $pass_fail_validation = 1;
                       @endphp
                       @endif

                   </div>
                        @endif
                        </td>
                            @php
                            $i ++;
                            @endphp
                            @endforeach
                            <td style="min-width: 250px">
                                <button type="submit" class="btn btn-success"> Save All </button>
                                @if(!empty($totalStudentMark))
                                <a class="btn btn-primary" target="_blank" 
                                href="{{url('teacher/my_exam_result/print?exam_id='.Request::get('exam_id').'&student_id='
              .$student->id)}}">Print </a>
                                <br>
                                <br>
                                <b>Subjects Total Mark:</b> {{ $totalFullMark }}<br>
                                <b>Subjects Passing Mark:</b>  {{ $totalPassingMark  }}<br>
                                <b>Student Total Mark:</b> {{ $totalStudentMark  }} <br><br>
                                @php
                                    $percent = ($totalStudentMark*100)/$totalFullMark;
                                    $getGrade = App\Models\MarksGrade::getGrade($percent);
                                @endphp
                               <b> Percentage : </b>{{round($percent,2)}}% <br>
                               @if(!empty($getGrade))
                               <b> Grade : </b>{{$getGrade}} <br>
                               @endif
                              
                            @if($pass_fail_validation == 0)
                                Result: <span style="color: green; font-weight: bold">Pass</span>
                                @else
                                Result: <span style="color: red; font-weight: bold">Fail</span>
                                @endif
                                @endif
                            </td>
                        </tr>
                    </form>
                        @endforeach
                        @endif
                    </tbody>
                  </table>


        </div>


    </div>
@endif

   </section>

  </div>
</div>
@endsection

@section('script')

<script type="text/javascript">

    $('.SubmitForm').submit(function(e){
        e.preventDefault();
        $.ajax({
        type: "POST",
        url: "{{ url('teacher/submit_marks_register') }}",
        data: $(this).serialize(),
        dataType: "json",
        success:function(data){
            notify(data.message, 3000);
        }
        });
    })


    $('.SaveSingleSubject').click(function(e){
        var student_id = $(this).attr('id');
        var subject_id = $(this).attr('data-val');
        var exam_id = $(this).attr('data-exam');
        var class_id = $(this).attr('data-class');
        var id = $(this).attr('data-schedule');
        var test_1_mark = $('#test_1_mark_'+student_id+subject_id).val();
        var test_2_mark = $('#test_2_mark_'+student_id+subject_id).val();
        var project_mark = $('#project_mark_'+student_id+subject_id).val();
        var exam_mark = $('#exam_mark_'+student_id+subject_id).val();

        $.ajax({
            type: "POST",
            url: "{{ url('teacher/single_submit_marks_register') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                id  : id,
                student_id  : student_id,
                subject_id  : subject_id,
                exam_id  : exam_id,
                class_id  : class_id,
                test_1_mark  : test_1_mark,
                test_2_mark  : test_2_mark,
                project_mark  : project_mark,
                exam_mark  : exam_mark

            },
            dataType: "json",
            success:function(data){
                notify(data.message, 3000);
            }
            });



        });
 </script>

@endsection





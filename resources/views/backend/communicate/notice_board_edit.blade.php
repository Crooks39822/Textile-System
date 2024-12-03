

@extends('backend.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Notice Board</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
   @include('_message')

        <div class="row">
          <div class="col-lg-12">
           <div class="card-header">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Edit Notice Board</h3>
                </div>

                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('title',$getRecord->title)}}"  name="title" id="exampleInputEmail1" placeholder="Enter Title ">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Notice Date</label>
                        <span style="color:red;">*</span>
                        <input type="date" class="form-control" value="{{ old('notice_date',$getRecord->notice_date)}}"  name="notice_date" id="exampleInputEmail1">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Publish Date</label>
                        <span style="color:red;">*</span>
                        <input type="date" class="form-control" value="{{ old('publish_date',$getRecord->publish_date)}}"  name="publish_date" id="exampleInputEmail1">
                      </div>
                        @php
                        $message_to_parent = $getRecord->getMessageToSingle($getRecord->id, 4);
                        $message_to_student = $getRecord->getMessageToSingle($getRecord->id, 3);
                        $message_to_teacher = $getRecord->getMessageToSingle($getRecord->id, 2);
                        @endphp
                      <div class="form-group">
                        <label style ="display: block;">Message To</label>
                        <label  style ="margin-right: 50px;">
                        <input {{ !empty($message_to_student) ? 'checked' : '' }} type="checkbox" value="3" name="message_to[]"> Employee
                    </label>
                        
                        <label  style ="margin-right: 50px;">
                        <input {{ !empty($message_to_teacher) ? 'checked' : '' }} type="checkbox" value="2"  name="message_to[]"> Supervisors
                    </label>

                      </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Message </label>

                        <textarea id="compose-textarea" name="message"  class="form-control" style="height: 400px">
                        {{$getRecord->message}}
                          </textarea>
                      </div>

                  <div class="card-footer">
                    <a href="{{url('admin/communicate/notice_board')}}" class="btn btn-danger"><i class="fa-solid fas fa-reply mr-2"></i>Back</a>
                        <button type="submit" class="btn btn-primary float-right">Update</button>
                  </div>
                </form>
              </div>
           </div>
          </div>


        </div>

      </div>
    </section>
      </div>
  @endsection
  @section('script')

  <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
  <script>
    $(function () {
        $('#compose-textarea').summernote({
            height: 250,   //set editable area's height

          });

    })
  </script>
  @endsection

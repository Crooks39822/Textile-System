

@extends('backend.layouts.app')
@section('style')
<link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">

  @endsection
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Submit Assignment</h1>
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
                  <h3 class="card-title">Submit Assignment</h3>
                </div>

                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Document</label>
                      <span style="color:red;"></span>
                      <input type="file" class="form-control"  name="document_file" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description </label>

                        <textarea id="compose-textarea" name="description" class="form-control" style="height: 400px">

                          </textarea>
                      </div>

                  <div class="card-footer">
                    <a href="{{url('student/my_assignment')}}" class="btn btn-danger"><i class="fa-solid fas fa-reply mr-2"></i>Back</a>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
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

    });

    
  </script>
  @endsection

  
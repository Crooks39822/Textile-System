

@extends('backend.layouts.app')
@section('style')
<link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
<style type="text/css">
.select2-container .select2-selection--single
{

height: 40px;

}
</style>
  @endsection
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Send Email</h1>
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
                  <h3 class="card-title">Send Email</h3>
                </div>

                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Subject</label>
                      <span style="color:red;"></span>
                      <input type="text" class="form-control"  name="subject" id="exampleInputEmail1" placeholder="Enter Title ">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">User (Employee  / Supervisor)</label>
                      
                      <select class="form-control select2" style="width: 100%;" name="user_id">

                      <option value="">Select</option>
                   
                    </select>
                        
                    </div>

                      <div class="form-group">
                        <label style ="display: block;">Message To</label>
                        <label style ="margin-right: 50px;"><input type="checkbox" value="3" name="message_to[]"> Employee</label>
                       
                        <label style ="margin-right: 50px;"><input type="checkbox" value="2"  name="message_to[]"> Supervisor</label>

                      </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Message </label>

                        <textarea id="compose-textarea" name="message" class="form-control" style="height: 400px">

                          </textarea>
                      </div>

                  <div class="card-footer">
                    <a href="{{url('admin/communicate/notice_board')}}" class="btn btn-danger"><i class="fa-solid fas fa-reply mr-2"></i>Back</a>
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
  <script src="{{ asset('backend/plugins/select2/js/select2.full.min.js')}}"></script>
  <script>
    $(function () {

        $('.select2').select2({
        ajax: {
        url: '{{ url('admin/communicate/search_user') }}',
        dataType: 'json',
        delay: 250,
        data: function (data) {
            return {
            search: data.term,

            };
        },
      
        processResults: function (response){
                return {
                results:response
                  };
                },
            }
        });

        $('#compose-textarea').summernote({
            height: 250,   //set editable area's height

          });

    });
  </script>
  @endsection


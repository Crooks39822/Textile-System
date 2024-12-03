

@extends('backend.layouts.app')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Employee</h1>
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
                  <h3 class="card-title">Add Employee</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="post"  enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                  <div class="row">
                  
                  <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">First name</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('name')}}" name="name" id="exampleInputEmail1" placeholder="Enter First Name">
                      <span style="color:red;">{{$errors->first('name')}}</span>
                    </div>


                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Last name</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('last_name')}}" name="last_name" id="exampleInputEmail1" placeholder="Enter Last Name">
                      <span style="color:red;">{{$errors->first('name')}}</span>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Clock Number</label>
                      <span style="color:red;"></span>
                      <input type="number" class="form-control" value="{{ old('admission_number')}}"
                       name="admission_number" placeholder="Enter Clock Number" onblur="duplicateEmail(this)">
                      <span style="color:red;" class="dublicate_message">{{$errors->first('admission_number')}}</span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Rate per Hour</label>
                      <span style="color:red;"></span>
                      <input type="text" class="form-control" value="{{ old('roll_number')}}" name="roll_number" placeholder="Enter Rate">
                      <span style="color:red;">{{$errors->first('roll_number')}}</span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Position</label>
                      <span style="color:red;">*</span>
                      <select class="form-control" name="qualification">
                        <option value="">Select Position</option>
                        @foreach($getPosition as $position)
                        <option  {{(old('qualification') == $position->id) ? 'selected' : ''}}  value="{{$position->id}}">{{$position->name}}</option>
                        @endforeach
                        </select>
                        <span style="color:red;">{{$errors->first('qualification')}}</span>
                    </div>
                    
                    

                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Mobile Number</label>
                      <span style="color:red;">*</span>
                      <input type="number" class="form-control" value="{{ old('phone')}}" name="phone" placeholder="Enter Mobile Number">
                      <span style="color:red;">{{$errors->first('phone')}}</span>
                    </div>


                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Department</label>
                      <span style="color:red;">*</span>
                      <select class="form-control" name="class_id">
                        <option value="">Select Department</option>
                        @foreach($getClass as $class)
                        <option  {{(old('class_id') == $class->id) ? 'selected' : ''}}  value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                        </select>
                        <span style="color:red;">{{$errors->first('class_id')}}</span>
                    </div>


                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Gender</label>
                      <span style="color:red;">*</span>
                      <select class="form-control" name="gender">
                      <option value="">Select Gender</option>
                        <option {{(old('gender') == 'Male') ? 'selected' : ''}} value="Male">Male</option>
                        <option {{(old('gender') == 'Female') ? 'selected' : ''}} value="Female">Female</option>
                        <option {{(old('gender') == 'Other') ? 'selected' : ''}} value="Female">Other</option>
                        </select>
                        <span style="color:red;">{{$errors->first('gender')}}</span>
                    </div>


                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Date of Birth</label>
                      <span style="color:red;">*</span>
                      <input type="date" id="dob" class="form-control" value="{{ old('date_of_birth')}}" name="date_of_birth">
                      <span style="color:red;">{{$errors->first('date_of_birth')}}</span>
                    </div>


                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Age</label>
                      <span style="color:red;">*</span>
                      <input type="number" id="age" class="form-control" value="{{ old('age')}}" name="age" readonly>
                      <span style="color:red;">{{$errors->first('age')}}</span>
                    </div>


                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">ID Number</label>
                      <span style="color:red;">*</span>
                      <input type="number" class="form-control" value="{{ old('id_number')}}" name="id_number" placeholder="Enter ID Number (13 Digits)">
                      <span style="color:red;">{{$errors->first('id_number')}}</span>
                    </div>


                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Physical Address</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('address')}}" name="address" placeholder="Enter Physical Address">
                      <span style="color:red;">{{$errors->first('address')}}</span>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Previous Employer</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('previous_school')}}" name="previous_school" placeholder="Enter Previous Employer ">
                      <span style="color:red;">{{$errors->first('previous_school')}}</span>
                    </div>


                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Admission Date</label>
                      <span style="color:red;">*</span>
                      <input type="date" class="form-control" value="{{ old('admission_date')}}" name="admission_date" placeholder="Enter Admission Date ">
                      <span style="color:red;">{{$errors->first('admission_date')}}</span>
                    </div>
                    
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Upload Contract Document</label>
                      <span style="color:red;"></span>
                      <input type="file" class="form-control"  name="document_file" id="exampleInputEmail1">
                    </div>

                    <div class="form-group col-md-6">
                      <label for="exampleInputFile">Employee Photo</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file"  class="form-control" name="avatar" id="exampleInputFile">

                        </div>

                      </div>
                      <span style="color:red;">{{$errors->first('avatar')}}</span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Bank Name</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('bank_name')}}" name="bank_name" placeholder="Enter Bank Name ">
                      
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Bank Account</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('bank_account')}}" name="bank_account" placeholder="Enter Bank Account ">
                      
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Status</label>
                      <span style="color:red;">*</span>
                      <select class="form-control" name="status">

                        <option {{(old('status') == '0') ? 'selected' : ''}}  value="0">Active</option>
                        <option {{(old('status') == '1') ? 'selected' : ''}}  value="1">Suspended</option>
                        <option {{(old('status') == '2') ? 'selected' : ''}}  value="2">Layoff</option>
                        <option {{(old('status') == '3') ? 'selected' : ''}}  value="3">Gone</option>
                       
                        </select>
                        <span style="color:red;">{{$errors->first('status')}}</span>
                    </div>

                </div>
                  <div class="card-footer">
                    <a href="{{url('admin/employee')}}" class="btn btn-danger"><i class="fa-solid fas fa-reply mr-2"></i>Back</a>
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



    <script type="text/javascript">
       function duplicateEmail(element)
      {
        var admission_number = $(element).val();
        $.ajax({
           type: "POST",
           url: '{{ url('check_clock_number') }}',
           data: {
            admission_number: admission_number,
            _token: "{{ csrf_token() }}"

           },
            dataType: "json",
            success: function(res){
            if(res.exists){
              $(".dublicate_message").html("This Clock Number is Already Registered. Try Another one...");
            }else{
              $(".dublicate_message").html("");
            }
            },
            error: function(jqXHR,exception){

            }
        });
      }

document.getElementById('dob').addEventListener('change', function() {
    var dob = new Date(this.value);
    var age = calculateAge(dob);
    document.getElementById('age').value = age;
});

function calculateAge(dob) {
    var diffMs = Date.now() - dob.getTime();
    var ageDt = new Date(diffMs);

    return Math.abs(ageDt.getUTCFullYear() - 1970);
}
</script>
  @endsection

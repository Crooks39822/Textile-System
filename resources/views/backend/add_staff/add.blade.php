

@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Admin</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
   @include('_message')

        <div class="row">
          <div class="col-lg-12">
           <div class="card-header">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add Admin</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="post"  enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Employee Number</label>
                      <span style="color:red;"></span>
                      <input type="text" class="form-control" value="{{ old('employee_number')}}"
                       name="employee_number" placeholder="Enter Employee Number" onblur="duplicateEmployeeNumber(this)">
                      <span style="color:red;" class="dublicate_message">{{$errors->first('employee_number')}}</span>
                    </div>
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
                      <label for="exampleInputEmail1">Mobile Number</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('phone')}}" name="phone" placeholder="Enter Mobile Number">
                      <span style="color:red;">{{$errors->first('phone')}}</span>
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
                      <label for="exampleInputEmail1">Marital Status</label>
                      <span style="color:red;">*</span>
                      <select class="form-control" name="marital_status">

                        <option {{(old('marital_status') == 'Single') ? 'selected' : ''}}  value="Single">Single</option>
                        <option {{(old('marital_status') == 'Married') ? 'selected' : ''}}  value="Married">Married</option>
                        </select>
                        <span style="color:red;">{{$errors->first('status')}}</span>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Fixed Salary</label>
                      <span style="color:red;"></span>
                      <input type="text" class="form-control" value="{{ old('roll_number')}}" name="roll_number" placeholder="Enter Salary">
                      <span style="color:red;">{{$errors->first('roll_number')}}</span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">ID Number</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('id_number')}}" name="id_number" maxlength="13" placeholder="Enter ID Number">
                      <span style="color:red;">{{$errors->first('id_number')}}</span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">GRADED TAX NUMBER</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('tax_number')}}" name="tax_number" id="exampleInputEmail1" placeholder="Enter GRADED TAX NUMBER">
                      <span style="color:red;">{{$errors->first('tax_number')}}</span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Admission Date</label>
                      <span style="color:red;">*</span>
                      <input type="date" class="form-control" value="{{ old('admission_date')}}" name="admission_date" placeholder="Enter Admission Date ">
                    </div>
                    <span style="color:red;">{{$errors->first('admission_date')}}</span>
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
                      <label for="exampleInputEmail1">Position</label>
                      <span style="color:red;">*</span>
                      <select class="form-control" name="occupation">
                        <option value="">Select Position</option>
                        @foreach($getRecord as $position)
                        <option  {{(old('occupation') == $position->id) ? 'selected' : ''}}  value="{{$position->id}}">{{$position->name}}</option>
                        @endforeach
                        </select>
                        <span style="color:red;">{{$errors->first('occupation')}}</span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1"> Qualification</label>
                      <span style="color:red;">*</span>
                      <textarea class="form-control" name="qualification">{{old('qualification')}}</textarea>
                      <span style="color:red;">{{$errors->first('qualification')}}</span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Physical Address</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('address')}}" name="address" placeholder="Enter Physical Address">
                      <span style="color:red;">{{$errors->first('address')}}</span>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="exampleInputFile">Staff Photo</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file"  class="form-control" name="avatar" id="exampleInputFile">

                        </div>

                      </div>
                      <span style="color:red;">{{$errors->first('avatar')}}</span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Upload Contract Document</label>
                      <span style="color:red;"></span>
                      <input type="file" class="form-control"  name="document_file" id="exampleInputEmail1">
                    </div>
                    <div class="card-footer form-group col-md-12">
                <b>BANKING  DETAILS</b>
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
                    <div class="card-footer form-group col-md-12">
                <b>NEXT OF KIN</b>
                </div>
                <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Name</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('nxt_name')}}" name="nxt_name" placeholder="Enter Next of Kin Name">
                      <span style="color:red;">{{$errors->first('nxt_name')}}</span>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Contacts</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('nxt_contact')}}" name="nxt_contact" placeholder="Enter Next of Kin Contacts">
                      <span style="color:red;">{{$errors->first('nxt_contact')}}</span>
                    </div>
                   
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Relationship</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('relationship')}}" name="relationship" placeholder="Enter Relationship">
                      <span style="color:red;">{{$errors->first('relationship')}}</span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Status</label>
                      <span style="color:red;">*</span>
                      <select class="form-control" name="status">

                        <option {{(old('status') == '0') ? 'selected' : ''}}  value="0">Active</option>
                        <option {{(old('status') == '1') ? 'selected' : ''}}  value="1">Inactive</option>
                        </select>
                        <span style="color:red;">{{$errors->first('status')}}</span>
                    </div>

                </div>

                  <div class="card-footer">
                    <a href="{{url('admin/staff')}}" class="btn btn-danger"><i class="fa-solid fas fa-reply mr-2"></i>Back</a>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                  </div>
                </form>
              </div>
           </div>
          </div>


        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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

      function duplicateEmployeeNumber(element)
      {
        var employee_number = $(element).val();
        $.ajax({
           type: "POST",
           url: '{{ url('check_employee_number') }}',
           data: {
            employee_number: employee_number,
            _token: "{{ csrf_token() }}"

           },
            dataType: "json",
            success: function(res){
            if(res.exists){
              $(".dublicate_message").html("This Staff Number is Already Registered. Try Another one...");
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


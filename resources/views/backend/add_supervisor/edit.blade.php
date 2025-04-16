

@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Supervisor</h1>
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
                  <h3 class="card-title">Edit Supervisor</h3>
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
                      <input type="text" class="form-control" value="{{ old('employee_number',$getRecord->admission_number)}}"
                       name="employee_number" placeholder="Enter Employee Number" onblur="duplicateEmployeeNumber(this)">
                      <span style="color:red;" class="dublicate_message">{{$errors->first('employee_number')}}</span>
                    </div>
                  <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">First name</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('name',$getRecord->name)}}" name="name" id="exampleInputEmail1" placeholder="Enter First Name">
                      <span style="color:red;">{{$errors->first('name')}}</span>
                    </div>
                    

                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Last name</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('last_name',$getRecord->last_name)}}" name="last_name" id="exampleInputEmail1" placeholder="Enter Last Name">
                      <span style="color:red;">{{$errors->first('name')}}</span>
                    </div>
                    

                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Mobile Number</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('phone',$getRecord->phone)}}" name="phone" placeholder="Enter Mobile Number">
                      <span style="color:red;">{{$errors->first('phone')}}</span>
                    </div>
                    @if(Auth::user()->parent_id == 2)
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Rate per Hour / Day</label>
                      <span style="color:red;"></span>
                      <input type="text" class="form-control" value="{{ old('roll_number',$getRecord->roll_number)}}" name="roll_number" placeholder="Enter Rate per Day">
                      <span style="color:red;">{{$errors->first('roll_number')}}</span>
                    </div>
                    @else
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Rate per Hour / Day</label>
                      <span style="color:red;"></span>
                      <input type="text" class="form-control"  value="{{ old('roll_number',$getRecord->roll_number)}}" name="roll_number" placeholder="Enter Rate per Day"readonly >
                      </span>
                    </div>
                    
                    @endif
                     
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">New Rate</label>
                      <span style="color:red;"></span>
                      <input type="text" class="form-control"  value="{{ old('new_rate',$getRecord->new_rate)}}" name="new_rate" placeholder="Enter New Rate">
                      </span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Gender</label>
                      <span style="color:red;">*</span>
                      <select class="form-control" name="gender">
                      <option value="">Select Gender</option>
                        <option {{(old('gender',$getRecord->gender) == 'Male') ? 'selected' : ''}} value="Male">Male</option>
                        <option {{(old('gender',$getRecord->gender) == 'Female') ? 'selected' : ''}} value="Female">Female</option>
                        <option {{(old('gender',$getRecord->gender) == 'Other') ? 'selected' : ''}} value="Female">Other</option>
                        </select>
                        <span style="color:red;">{{$errors->first('gender')}}</span>
                    </div>
                   

                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Date of Birth</label>
                      <span style="color:red;">*</span>
                      <input type="date" id="dob" class="form-control" value="{{ old('date_of_birth',$getRecord->date_of_birth)}}" name="date_of_birth">
                      <span style="color:red;">{{$errors->first('date_of_birth')}}</span>
                    </div>
                     <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Age</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('age',$getRecord->age)}}" id="age" name="age" placeholder="Enter Age">
                      <span style="color:red;">{{$errors->first('id_number')}}</span>
                    </div>
                    
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Marital Status</label>
                      <span style="color:red;">*</span>
                      <select class="form-control" name="marital_status">
                      
                        <option {{(old('marital_status',$getRecord->marital_status) == 'Single') ? 'selected' : ''}}  value="Single">Single</option>
                        <option {{(old('marital_status',$getRecord->marital_status) == 'Married') ? 'selected' : ''}}  value="Married">Married</option>
                        </select>
                        <span style="color:red;">{{$errors->first('status')}}</span>
                    </div>
                

                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">ID Number</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('id_number',$getRecord->id_number)}}" name="id_number" placeholder="Enter ID Number">
                      <span style="color:red;">{{$errors->first('id_number')}}</span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">GRADED TAX NUMBER</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('tax_number', $getRecord->tax_number)}}" name="tax_number" id="exampleInputEmail1" placeholder="Enter GRADED TAX NUMBER">
                      <span style="color:red;">{{$errors->first('tax_number')}}</span>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Current Address</label>
                      <span style="color:red;">*</span>
                      <textarea class="form-control" name="address">{{old('address',$getRecord->address)}}</textarea>
                      <span style="color:red;">{{$errors->first('address')}}</span>
                    </div>
                   
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Permanent Address</label>
                      <span style="color:red;">*</span>
                      <textarea class="form-control" name="p_address">{{old('p_address',$getRecord->p_address)}}</textarea>
                      <span style="color:red;">{{$errors->first('p_address')}}</span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1"> Qualification</label>
                      <span style="color:red;">*</span>
                      <textarea class="form-control" name="qualification">{{old('qualification',$getRecord->qualification)}}</textarea>
                      <span style="color:red;">{{$errors->first('qualification')}}</span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1"> Work Experience</label>
                      <span style="color:red;">*</span>
                      <textarea class="form-control" name="work_experience">{{old('work_experience',$getRecord->work_experience)}}</textarea>
                      <span style="color:red;">{{$errors->first('work_experience')}}</span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Date of Joining</label>
                      <span style="color:red;">*</span>
                      <input type="date" class="form-control" value="{{ old('admission_date',$getRecord->admission_date)}}" name="admission_date" placeholder="Enter Admission Date ">
                    </div>
                    <span style="color:red;">{{$errors->first('admission_date')}}</span>

                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">  Probation Date</label>
                      <span style="color:red;">*</span>
                      <input type="date" class="form-control" value="{{ old('probation_date',$getRecord->probation_date)}}" name="probation_date" placeholder="Enter Admission Date ">
                    
                      <span style="color:red;">{{$errors->first('probation_date')}}</span>
                    </div>
                    

                    
                    <div class="form-group col-md-6">
                      <label for="exampleInputFile">Supervisor Photo</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file"  class="form-control" name="avatar" id="exampleInputFile">
                          
                        </div>

                      </div>
                      @if(!empty($getRecord->getProfile()))
                        <img src="{{$getRecord->getProfile()}}" style="width: auto;height: 50px;">
                        @endif
                      <span style="color:red;">{{$errors->first('avatar')}}</span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Upload Contract Document</label>
                      <span style="color:red;"></span>
                      <input type="file" class="form-control"  name="document_file" id="exampleInputEmail1">
                      @if(!empty($getRecord->getDocument()))
                      <a href="{{$getRecord->getDocument()}}" class="btn btn-primary" download="">Download</a>

                      @endif
                    </div>
                    <div class="card-footer form-group col-md-12">
                <b>BANKING  DETAILS</b>
                </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Bank Name</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('bank_name',$getRecord->bank_name)}}" name="bank_name" placeholder="Enter Bank Name ">
                      <span style="color:red;">{{$errors->first('bank_name')}}</span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Bank Account</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('bank_account',$getRecord->bank_account)}}" name="bank_account" placeholder="Enter Bank Account ">
                      <span style="color:red;">{{$errors->first('bank_name')}}</span>
                    </div>
                    <div class="card-footer form-group col-md-12">
                <b>NEXT OF KIN</b>
                </div>
                <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Name</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('nxt_name',$getRecord->nxt_name)}}" name="nxt_name" placeholder="Enter Next of Kin Name">
                      <span style="color:red;">{{$errors->first('nxt_name')}}</span>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Contacts</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('nxt_contact',$getRecord->nxt_contact)}}" name="nxt_contact" placeholder="Enter Next of Kin Contacts">
                      <span style="color:red;">{{$errors->first('nxt_contact')}}</span>
                    </div>
                   
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Relationship</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('relationship',$getRecord->relationship)}}" name="relationship" placeholder="Enter Relationship">
                      <span style="color:red;">{{$errors->first('relationship')}}</span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Status</label>
                      <span style="color:red;">*</span>
                      <select class="form-control" name="status">
                        <option value="">Select Status</option>
                        @foreach($getEmpoyeeStatus as $position)
                        <option  {{(old('status',$getRecord->status) == $position->id) ? 'selected' : ''}}  value="{{$position->id}}">{{$position->name}}</option>
                        @endforeach
                        </select>
                        <span style="color:red;">{{$errors->first('status')}}</span>
                    </div>
                
                <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Probation Status</label>
                      <span style="color:red;">*</span>
                      <select class="form-control" name="probation_status">
                      
                        <option {{(old('probation_status',$getRecord->probation_status) == '0') ? 'selected' : ''}}  value="0">Pending</option>
                        <option {{(old('probation_status',$getRecord->probation_status) == '1') ? 'selected' : ''}}  value="1">Attended</option>
                        </select>
                        <span style="color:red;">{{$errors->first('status')}}</span>
                    </div>
                </div>
                  <div class="card-footer">
                    <a href="{{url('admin/supervisor')}}" class="btn btn-danger"><i class="fa-solid fas fa-reply mr-2"></i>Back</a>
                        <button type="submit" class="btn btn-primary float-right">Update</button>
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


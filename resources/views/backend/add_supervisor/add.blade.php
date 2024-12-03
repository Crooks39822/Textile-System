

@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Supervisor</h1>
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
                  <h3 class="card-title">Add Supervisor</h3>
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
                      <label for="exampleInputEmail1">Mobile Number</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('phone')}}" name="phone" placeholder="Enter Mobile Number">
                      <span style="color:red;">{{$errors->first('phone')}}</span>
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
                      <input type="date" class="form-control" value="{{ old('date_of_birth')}}" name="date_of_birth">
                      <span style="color:red;">{{$errors->first('date_of_birth')}}</span>
                    </div>


                    
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Marital Status</label>
                      <span style="color:red;">*</span>
                      <select class="form-control" name="marital_status">

                        <option {{(old('status') == 'Single') ? 'selected' : ''}}  value="Single">Single</option>
                        <option {{(old('status') == 'Married') ? 'selected' : ''}}  value="Married">Married</option>
                        </select>
                        <span style="color:red;">{{$errors->first('status')}}</span>
                    </div>


                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">ID Number</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('id_number')}}" name="id_number" maxlength="13" placeholder="Enter ID Number">
                      <span style="color:red;">{{$errors->first('id_number')}}</span>
                    </div>


                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Current Address</label>
                      <span style="color:red;">*</span>
                      <textarea class="form-control" name="address">{{old('address')}}</textarea>
                      <span style="color:red;">{{$errors->first('address')}}</span>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Permanent Address</label>
                      <span style="color:red;">*</span>
                      <textarea class="form-control" name="p_address">{{old('p_address')}}</textarea>
                      <span style="color:red;">{{$errors->first('p_address')}}</span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1"> Qualification</label>
                      <span style="color:red;">*</span>
                      <textarea class="form-control" name="qualification">{{old('qualification')}}</textarea>
                      <span style="color:red;">{{$errors->first('qualification')}}</span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1"> Work Experience</label>
                      <span style="color:red;">*</span>
                      <textarea class="form-control" name="work_experience">{{old('work_experience')}}</textarea>
                      <span style="color:red;">{{$errors->first('work_experience')}}</span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">  Note</label>
                      <span style="color:red;">*</span>
                      <textarea class="form-control" name="note">{{old('note')}}</textarea>
                      <span style="color:red;">{{$errors->first('note')}}</span>
                    </div>


                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Date of Joining</label>
                      <span style="color:red;">*</span>
                      <input type="date" class="form-control" value="{{ old('admission_date')}}" name="admission_date" placeholder="Enter Admission Date ">
                    </div>
                    <span style="color:red;">{{$errors->first('admission_date')}}</span>

                    <div class="form-group col-md-6">
                      <label for="exampleInputFile">Supervisor Photo</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="form-control" name="avatar" id="exampleInputFile">

                        </div>

                      </div>
                      <span style="color:red;">{{$errors->first('avatar')}}</span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Upload Contract Document</label>
                      <span style="color:red;"></span>
                      <input type="file" class="form-control"  name="document_file" id="exampleInputEmail1">
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
                        <option {{(old('status') == '1') ? 'selected' : ''}}  value="1">Inactive</option>
                        </select>
                        <span style="color:red;">{{$errors->first('status')}}</span>
                    </div>
                </div>
                  <div class="card-footer">
                    <a href="{{url('admin/supervisor')}}" class="btn btn-danger"><i class="fa-solid fas fa-reply mr-2"></i>Back</a>
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
  <!-- /.footer -->


  <!-- Control Sidebar -->
  @endsection

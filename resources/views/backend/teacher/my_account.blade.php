

@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">My Account</h1>
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
                  <h3 class="card-title">My Account </h3>
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
                      <input type="date" class="form-control" value="{{ old('date_of_birth',$getRecord->date_of_birth)}}" name="date_of_birth">
                      <span style="color:red;">{{$errors->first('date_of_birth')}}</span>
                    </div>
                    

                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Marital Status</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('marital_status',$getRecord->marital_status)}}" name="marital_status" placeholder="Enter Marital Status">
                      <span style="color:red;">{{$errors->first('marital_status')}}</span>
                    </div>
                    

                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">ID Number</label>
                      <span style="color:red;">*</span>
                      <input type="text" class="form-control" value="{{ old('id_number',$getRecord->id_number)}}" name="id_number" placeholder="Enter ID Number">
                      <span style="color:red;">{{$errors->first('id_number')}}</span>
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
                      <label for="exampleInputFile">Teacher Photo</label>
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
                        <label for="exampleInputEmail1">Email address</label>
                        <span style="color:red;">*</span>
                        <input type="email" class="form-control" value="{{ old('email',$getRecord->email)}}" name="email" id="exampleInputEmail1" placeholder="Enter email">
                        <span style="color:red;">{{$errors->first('email')}}</span>
                      </div>
</div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                   
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
  <!-- /.footer -->


  <!-- Control Sidebar -->
  @endsection

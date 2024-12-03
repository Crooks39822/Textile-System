<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome | Registration</title>
  @php 
$getHeaderSetting = App\Models\Setting::getSingle();
    @endphp
    <link href="{{ $getHeaderSetting->getFavicon()}}" rel="icon" type="image/jpg"/>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="/"><b>Register</b>Account</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new Member</p>

      <form action="{{ route('register_user') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" value="{{ old('name')}}" placeholder="Full Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <span style="color:red;">{{$errors->first('name')}}</span>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="last_name" value="{{ old('last_name')}}"  placeholder="Last Name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <span style="color:red;">{{$errors->first('last_name')}}</span>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="phone" value="{{ old('phone')}}"  placeholder="Phone Number">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>
          <span style="color:red;">{{$errors->first('phone')}}</span>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" value="{{ old('email')}}" placeholder="Email" onblur="duplicateEmail(this)">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <span style="color:red;" class="duplicate_message">{{$errors->first('email')}}</span>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password"  placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <span style="color:red;">{{$errors->first('password')}}</span>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="confirm_password"  placeholder="Confirm password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <span style="color:red;">{{$errors->first('confirm_password')}}</span>
        <div class="row">

          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>



      <a href="/" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
<script>
    function duplicateEmail(element){
    var email = $(element).val();
    //alert(email);
    $.ajax({
    type: "POST",
    url:'{{route('checkEmail')}}',
    data : {
        email: email,
        _token: "{{csrf_token()}}"
    },
    dataType: "json",
    success: function(res){
    if(res.exists){
        alert('true');
    }else{
  $('.duplicate_message').html("");
    }
    },
    error: function (jqXHR, exception) {

    }
    });
    }

  </script>




</body>
</html>

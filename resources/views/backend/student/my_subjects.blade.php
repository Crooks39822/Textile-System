

@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Subjects  </h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <section class="content">
      <div class="container-fluid">


        <div class="row">

           @include('_message')
           <div class="col-md-12">
           <div class="card">
            <div class="card-header">

            <h3 class="card-title">My Subjects</h3>
            </div>
            <div class="card-body table-responsive p-0" style="overflow: auto;">
            <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>

                        <th >Subject Name</th>
                        <th >Subject Code</th>
                        <th >Subject Type</th>

                      </tr>
                    </thead>
                    <tbody>
                   @foreach($getRecord as $value)
                    <tr>
                    <td>{{ $value->subject_name}}</td>
                    <td>{{ $value->subject_code}}</td>
                    <td>{{ $value->subject_type}}</td>
                    </tr>
                   @endforeach
                    </tbody>
                  </table>

            <div style="padding: 10px; float:right;">

        </div>
        </div>
    </div>



    </section>
    <!-- /.content -->
  </div>
</div>
  <!-- /.footer -->


  <!-- Control Sidebar -->
  @endsection

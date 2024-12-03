<footer class="main-footer">
@php 
$getFooterSetting = App\Models\Setting::getSingle();
@endphp
    <strong>Copyright &copy; {{ date('Y') }} <a href="#">({{$getFooterSetting->name}}) </a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Developed By</b> Ayanda Ngwenya
    </div>
  </footer>

@component('mail::message')
<p>Hello,  <b>{{ $user->name }} {{ $user->last_name }}</b></p><br>
Your Username:  <b>{{ $user->email }}</b><br>
Your Password:  <b>{{ $user->randome_password }}</b><br><br><br>
@component('mail::button',['url' => url('/')])
    Click Here to Login
@endcomponent
<p> OR Try this URL </p>

  <a href="#">{{ Request::server ("SERVER_NAME") }}</a><br>

<p> In case you have issues please contact our help line on contact us<br><br>
    Thanks <br>

    {{ config('app.name') }}
@endcomponent

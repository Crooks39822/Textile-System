@component('mail::message')
Hello,  <b>{{ $user->name }} {{ $user->last_name }}</b><br>
<b>{{ $user->send_subject }}</b><br>
{!! $user->send_message !!}<br>
    Thank You!!

{{ config('app.name') }}
@endcomponent

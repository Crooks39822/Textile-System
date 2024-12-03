@component('mail::message')
<p>Hello, {{ $user->name }} {{ $user->last_name }}</p>
<p>We understand it happens sometimes!</p>
@component('mail::button',['url' => url('reset/'.$user->remember_token)])
    Reset Your Password
@endcomponent
<p> In case you have issues please contact our help line on contact us <br> <br>
    Thanks <br>
    {{ config('app.name') }}
@endcomponent

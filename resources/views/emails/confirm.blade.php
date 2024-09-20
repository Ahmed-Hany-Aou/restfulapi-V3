@component('mail::message')
#  Hello {{$user->name}}

You Changed your email, so we need to varifiy this new address. please use the button below


@component('mail::button', ['url' => route('verify', $user->verification_token)])
Verify Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent


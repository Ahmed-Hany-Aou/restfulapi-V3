 Hello {{$user->name}}

You Changed your email, so we need to varifiy this new address. please use the link below

{{route('verify', $user->verification_token)}}

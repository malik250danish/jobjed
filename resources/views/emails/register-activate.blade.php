@extends('emails/layouts/default')@section('content')
	<p>Hello {!! $user->first_name !!},</p>
	<p>Welcome to Jobjed! Please click on the following link to confirm your {{ env('APP_NAME') }} account:</p>
	<p><a href="{!! $activationUrl !!}"><button>Confirm your email</button></a></p>
	<p>Best regards,</p><p>Jobjed Team</p>
@stop
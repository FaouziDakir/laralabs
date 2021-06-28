@extends('layouts.backoffice')

@section('content')

<div class="container">
        <div class="">
            <h2>De : {{$mail->name}} ({{$mail->email}})</h2>
            <h2>Sujet : {{$mail->subject}}</h2>
            <h2>Message : {{$mail->message}}</h2>
        </div>
</div>

@endsection
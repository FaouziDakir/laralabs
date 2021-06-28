@extends('layouts.backoffice')

@section('content')


<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                    <h1>mails reçus</h1>
                    <ul>
                    @foreach($mails as $mail)
                        <li>de : {{$mail->name}} <a href="/admin/mails/{{$mail->id}}/showmail">🔍</a>
                    </li>
                    @endforeach
                    </ul>
            </div>
            <div class="col-md-8">
            </div>
        </div>
    </div>
@endsection
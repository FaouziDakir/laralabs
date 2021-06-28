@extends('layouts.backoffice')

@section('content')


<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                    <h1>newsletter</h1>
                    <ul>
                    @foreach($newsletters as $newsletter)
                        <li> {{$newsletter->email}} 
                            {{-- <a href="/admin/mails/{{$mail->id}}/showmail">🔍</a> --}}
                    </li>
                    @endforeach
                    </ul>
            </div>
            <div class="col-md-8">
                    <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">{{ __('Envoyer mail') }}</div>
                
                                <div class="card-body">
                                    <form method="POST" action="/admin/newsletter">
                                        @csrf
                
                                        <div class="form-group row">
                                            <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>
                
                                            <div class="col-md-6">
                                                <textarea id="message" type="textarea" class="form-control" name="message" required autocomplete="message"> </textarea>
                                            </div>
                                        </div>

                
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Envoyer') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>
@endsection
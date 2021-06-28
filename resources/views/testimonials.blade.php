@extends('layouts.backoffice')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                    <h1>Liste testimonials</h1>
                    <ul>
                    @foreach($testimonials as $testi)
                        <li>{{$testi->name}} 
                            <a href="/admin/testimonials/{{$testi->id}}/edittestimonial">✎</a>
                    </li>
                    @endforeach
                    </ul>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Nouveau testimonial') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="/admin/testimonials" enctype="multipart/form-data">
                            @csrf
    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="job" class="col-md-4 col-form-label text-md-right">{{ __('Job') }}</label>
    
                                <div class="col-md-6">
                                    <input id="job" type="text" class="form-control" name="job" value="{{ old('job') }}" required autocomplete="job">
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="message" type="text" class="form-control" name="message" value="{{ old('message') }}" required autocomplete="job">
                                    </div>
                                </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Image</label>
                                <input class="col-md-6" type="file" name="image" id="image">
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Enregistrer') }}
                                    </button>
                                </div>
                            </div>

                            @if ($errors->any())
               <ul class="list-unstyled">
                   @foreach ($errors->all() as $error)
                       <li class="bg-warning text-danger">{{$error}}</li>
                   @endforeach
               </ul>
           @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
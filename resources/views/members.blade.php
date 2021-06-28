@extends('layouts.backoffice')

@section('content')


<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                    <h1>Membres Inscrits</h1>
                    <ul>
                    @foreach($users as $user)
                    <li>{{$user->name}}({{$user->role}})<a href="/admin/members/{{$user->id}}/editmember">✎</a></li>
                    @endforeach
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Inscrire nouveau membre') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="/admin/members" enctype="multipart/form-data">
                            @csrf
    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                 
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse Email') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                  
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmation MDP') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="biographie" class="col-md-4 col-form-label text-md-right">{{ __('Biographie') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="biographie" type="text" class="form-control" name="biographie" value="{{ old('biographie') }}" required autocomplete="name" autofocus>
        
                                     
                                    </div>
                                </div>

                            <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Image</label>
                                    <input class="col-md-6" type="file" name="avatar" id="avatar">
                                </div>

                            <div class="form-group row d-flex justify-content-center w-100">
                                <select name="role">
                                    <option value="user">Membre</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Envoyer') }}
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
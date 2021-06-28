<?php
function lastWord($string)
{
   $listWords = explode('-', $string);
   array_shift($listWords);
   array_shift($listWords);
   $lastWord = implode('-', $listWords);

   return ucfirst($lastWord);
}
?>

@extends('layouts.backoffice')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
                <h1>liste services</h1>
                <ul>
                @foreach($services as $service)
                    <li>{{$service->titre}} 
                        <a href="/admin/services/{{$service->id}}/editservice">✎</a>
                </li>
                @endforeach
                </ul>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Inscrire nouveau service') }}</div>

                <div class="card-body">
                    <form method="POST" action="/admin/services">
                        @csrf

                        <div class="form-group row">
                            <label for="titre" class="col-md-4 col-form-label text-md-right">{{ __('Titre') }}</label>

                            <div class="col-md-6">
                                <input id="titre" type="text" class="form-control" name="titre" value="{{ old('titre') }}" required autocomplete="titre" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="texte" class="col-md-4 col-form-label text-md-right">{{ __('Texte') }}</label>

                            <div class="col-md-6">
                                <input id="texte" type="text" class="form-control" name="texte" value="{{ old('texte') }}" required autocomplete="texte">
                            </div>
                        </div>

                        <div class="form-group row d-flex justify-content-center w-100">
                            <select name="icone">
                                @foreach ($icons as $icon)
                                    <option value="{{$icon}}">{{lastWord($icon)}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enregistrer') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
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
                <h1>Liste projets</h1>
                <ul>
                @foreach($projects as $project)
                    <li>{{$project->name}} 
                        <a href="/admin/projects/{{$project->id}}/editproject">✎</a>
                </li>
                @endforeach
                </ul>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Inscrire nouveau projet') }}</div>

                <div class="card-body">
                    <form method="POST" action="/admin/projects" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>

                            <div class="col-md-6">
                                <input id="message" type="text" class="form-control" name="message" value="{{ old('message') }}" required autocomplete="message">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Image</label>
                            <input class="col-md-6" type="file" name="image" id="image">
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
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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Modifier service : '.$service->titre) }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="/admin/services/{{$service->id}}/editservice">
                            {{method_field('PATCH')}}
                            @csrf
    
                            <div class="form-group row">
                                    <label for="titre" class="col-md-4 col-form-label text-md-right">{{ __('Titre') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="titre" type="text" class="form-control" name="titre" required autocomplete="titre" autofocus value="{{$service->titre}}">
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="texte" class="col-md-4 col-form-label text-md-right">{{ __('Texte') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="texte" type="text" class="form-control" name="texte" required autocomplete="texte" value="{{$service->texte}}">
                                    </div>
                                </div>
        
                                <div class="form-group row d-flex justify-content-center w-100">
                                    <select name="icone">
                                        @foreach ($icons as $icon)
                                            @if($service->icone == $icon)
                                                <option selected value="{{$icon}}">{{lastWord($icon)}}</option>                                        
                                            @else 
                                                <option value="{{$icon}}">{{lastWord($icon)}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group row mb-0 d-flex justify-content-around w-100">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Modifier') }}
                                            </button>
        
    

                        </form>
                                            <form method="POST" action="/admin/services/{{$service->id}}/editservice">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </form>
                    
                                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


@endsection
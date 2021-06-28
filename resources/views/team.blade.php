@extends('layouts.backoffice')

@section('content')


<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                    <h1>liste responsables</h1>
                    <ul>
                    @foreach($teamMembers as $teamMember)
                        <li>{{$teamMember->name}} <a href="/admin/team/{{$teamMember->id}}/editteammember">✎</a>
                        <form method="POST" action="/admin/{{$teamMember->id}}">
                            @method('PATCH')
                            @csrf
                                <input type="checkbox" name="completed" onChange="this.form.submit()" {{$teamMember->main ? 'checked' : ''}}>
                        </form>
                    </li>
                    @endforeach
                    </ul>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Inscrire nouveau responsable') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="/admin/team" enctype="multipart/form-data">
                            @csrf
    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="teamrole" class="col-md-4 col-form-label text-md-right">{{ __('Poste') }}</label>
    
                                <div class="col-md-6">
                                    <input id="teamrole" type="text" class="form-control" name="teamrole" value="{{ old('teamrole') }}" required autocomplete="teamrole">
    
                                </div>
                            </div>

                            <div>
                                <label class="col-md-4 col-form-label text-md-right">Image</label>
                                <input class="col-md-6" type="file" name="teamimage" id="teamimage">
                            </div>
    
                            <div class="form-group mt-3 row mb-0">
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
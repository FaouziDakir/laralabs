@extends('layouts.backoffice')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Modifier profil de '.$user->name) }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="/admin/members/{{$user->id}}/editmember">
                            {{method_field('PATCH')}}
                            @csrf
    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>
    
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse Mail') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{$user->email}}" required autocomplete="email">
    
                                </div>
                            </div>

                            <div class="form-group row d-flex justify-content-center w-100">
                                <select name="role">
                                    @if($user->role === 'admin')
                                        <option value="user">Membre</option>
                                        <option selected value="admin">Admin</option>
                                    @else
                                        <option selected value="user">Membre</option>
                                        <option value="admin">Admin</option>
                                    @endif
                                </select>
                            </div>
    
                            <div class="form-group row mb-0 d-flex justify-content-around w-100">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Modifier') }}
                                    </button>
                        </form>
                    
                                <form method="POST" action="/admin/members/{{$user->id}}/editmember">
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
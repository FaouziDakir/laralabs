@extends('layouts.backoffice')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Modifier '. $teamMember->name) }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="/admin/team/{{$teamMember->id}}/editteammember" enctype="multipart/form-data">
                            {{method_field('PATCH')}}
                            @csrf
    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{$teamMember->name}}" required autocomplete="name" autofocus>
    
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="teamrole" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
    
                                <div class="col-md-6">
                                    <input id="teamrole" type="text" class="form-control" name="teamrole" value="{{$teamMember->teamrole}}" required autocomplete="teamrole">
                                </div>
                            </div>

                            <div>
                                <label class="col-md-4 col-form-label text-md-right">Image</label>
                                <input class="col-md-6" type="file" name="teamimage" id="teamimage">
                            </div>
    
                            <div class="form-group mt-3 row mb-0 d-flex justify-content-around w-100">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Modifier') }}
                                    </button>

                        </form>
                                            <form method="POST" action="/admin/team/{{$teamMember->id}}/editteammember">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </form>
                    
                                        </div>

                            @if ($message = Session::get('error'))
                                {{$message}}
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


@endsection
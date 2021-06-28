@extends('layouts.backoffice')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Modifier profil de '. $testimonials->name) }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="/admin/testimonials/{{$testimonials->id}}/edittestimonial" enctype="multipart/form-data">
                            {{method_field('PATCH')}}
                            @csrf
    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{$testimonials->name}}" required autocomplete="name" autofocus>
    
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="job" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
    
                                <div class="col-md-6">
                                    <input id="job" type="text" class="form-control" name="job" value="{{$testimonials->job}}" required autocomplete="job">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>
    
                                <div class="col-md-6">
                                    <input id="message" type="text" class="form-control" name="message" value="{{$testimonials->message}}" required autocomplete="job">
                                </div>
                            </div>

                            <div>
                                <label class="col-md-4 col-form-label text-md-right">Image</label>
                                <input class="col-md-6" type="file" name="image" id="image">
                            </div>
    
                            <div class="form-group row mt-3 mb-0 d-flex justify-content-around w-100">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Modifier') }}
                                    </button>

                        </form>
                                            <form method="POST" action="/admin/testimonials/{{$testimonials->id}}/edittestimonial">
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
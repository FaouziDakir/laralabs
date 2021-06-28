@extends('layouts.backoffice')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
                <h1>Liste posts</h1>
                <ul>
                @foreach($posts as $post)
                    <li>{{$post->titre}} 
                        {{-- <a href="/admin/projects/{{$project->id}}/editproject">✎</a> --}}
                </li>
                @endforeach
                </ul>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Inscrire nouveau projet') }}</div>

                <div class="card-body">
                    <form method="POST" action="/admin/articles" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="titre" class="col-md-4 col-form-label text-md-right">{{ __('Titre') }}</label>

                            <div class="col-md-6">
                                <input id="titre" type="text" class="form-control" name="titre" value="{{ old('titre') }}" required autocomplete="titre" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>

                            <div class="col-md-6">
                                <input id="message" type="text" class="form-control" name="message" value="{{ old('message') }}" required autocomplete="message">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tags" class="col-md-4 col-form-label text-md-right">{{ __('Tags') }}</label>

                            <div class="col-md-6">
                                <input id="tags" type="text" class="form-control" name="tags" value="{{ old('tags') }}" required autocomplete="tags">
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@extends('layouts.master')

@section('content')

<form method="POST" action="{{route('edited',$id)}}">
{!! csrf_field() !!} 
   <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header ">{{ __('Modificar película') }}</div>
                  <div class="card-body">
                     <div class="form-group row">
                           <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                           <div class="col-md-6">
                              <input id="title" type="text" class="form-control" name="title" value="{{$pelicula->title}}"required autofocus>
                           </div>
                     </div>

                     <div class="form-group row">
                           <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Year') }}</label>
                           <div class="col-md-6">
                              <input id="year" type="text" class="form-control" name="year" value="{{$pelicula->year}}" required autofocus>
                           </div>
                     </div>

                     <div class="form-group row">
                           <label for="director" class="col-md-4 col-form-label text-md-right">{{ __('Director') }}</label>
                           <div class="col-md-6">
                              <input id="director" type="text" class="form-control" name="director" value="{{$pelicula->director}}" required autofocus>
                           </div>
                     </div>

                     <div class="form-group row">
                           <label for="poster" class="col-md-4 col-form-label text-md-right">{{ __('Poster') }}</label>
                           <div class="col-md-6">
                              <input id="poster" type="text" class="form-control" name="poster" value="{{$pelicula->poster}}" required autofocus>
                           </div>
                     </div>

                     <div class="form-group row">
                           <label for="synopsis" class="col-md-4 col-form-label text-md-right">{{ __('Synopsis') }}</label>
                           <div class="col-md-6">
                              <textarea name="synopsis" class="form-control" id="synopsis" name="synopsis"  cols="30" rows="10" required autofocus>{{$pelicula->synopsis}}</textarea>
                           </div>
                     </div>

                     <div class="form-group row mb-0">
                           <div class="col-sm-6 col-md-6 col-lg-12 text-center">
                              <button type="submit" class="btn btn-primary">
                                 {{ __('Modificar película') }}
                              </button>
                           </div>
                     </div>
                  </div>
            </div>
        </div>
   </div>
</form>

@stop
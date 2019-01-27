@extends('layouts.master')

@section('content')

<div class="row">

@foreach( $peliculas as $pelicula )
<div class="col-xs-6 col-sm-4 col-md-3 text-center">

    <a href="{{route('show',$pelicula->id)}}">
        <img src="{{$pelicula->poster}}"  width="140px" height="200px"/>
        <h4 style="min-height:45px;margin:5px 0 10px 0">
            {{$pelicula->title}}
        </h4>
    </a>
   
</div>
@endforeach
    <div class="col-xs-12 col-sm-12 col-md-12 text-center paginador">  {{ $peliculas->links() }}</div> 
</div>
    
@stop
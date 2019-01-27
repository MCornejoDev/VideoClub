@extends('layouts.master')

@section('content')

<?php
$alquilada = $pelicula['rented'];

?>
<style>
.btn-danger, .btn-warning
{
   color: white !important;
}

.btn-primary{
   border-color:blue;
   border-width:0.5px !important;
}

.btn-warning{
   border-color:#ffc107;
   border-width:0.5px !important;
}

.btn-danger{
   border-color:#dc3545;
   border-width:0.5px !important;
}

.btn-blanco{
   background-color:white;
   border-color:black;
   border-width:0.5px !important;
}

@media only screen and (max-width: 768px){
   .btn{
      margin-bottom:5px !important;
   }
}

form{
   display:inline !important;
}

</style>
   <div class="row">
       <div class="col-sm-4 text-center">
           <img src="{{$pelicula->poster}}" alt="{{$pelicula->title}}" width="214" height="321">
       </div>
       <div class="col-sm-8">
         <h3>{{$pelicula->title}}</h3>
         <h4>Año : {{$pelicula->year}}</h4>
         <h4>Director : {{$pelicula->director}}</h4>
         <p><strong>Resumén: </strong> {{$pelicula->synopsis}} </p>
         @if($alquilada == false)
            <p><strong>Estado:</strong> Película disponible</p>     
            <form method="POST" action="{{route('rented',$id)}}">
               {!! csrf_field() !!} 
               <button class="btn btn-default btn-primary">Alquilar película</button>
            </form>
            <form method="POST" action="{{route('deleted',$id)}}">
               {!! csrf_field() !!} 
               <button class="btn btn-default btn-primary">Eliminar película</button>
            </form>
            <a href="{{route('edit',$id)}}"><button class="btn btn-default btn-warning"><i class="fa fa-pencil-square-o"></i>  Editar película</button></a>
            <a href="{{route('catalog')}}"><button class="btn btn-default  btn-blanco"><i class="fa fa-chevron-left"></i> Volver al listado</button></a>
         @else
            <p><strong>Estado:</strong>  Película actualmente alquilada</p>
            <form method="POST" action="{{route('return',$id)}}">
               {!! csrf_field() !!} 
               <button class="btn btn-default btn-danger">Devolver película</button>
            </form>
            <form method="POST" action="{{route('deleted',$id)}}">
               {!! csrf_field() !!} 
               <button class="btn btn-default btn-primary">Eliminar película</button>
            </form>
            <a href="{{route('edit',$id)}}"><button class="btn btn-default btn-warning"><i class="fa fa-pencil-square-o"></i> Editar película</button></a>
            <a href="{{route('catalog')}}"><button class="btn btn-default  btn-blanco"><i class="fa fa-chevron-left"></i> Volver al listado</button></a>
         @endif

       </div>
   </div>
@stop
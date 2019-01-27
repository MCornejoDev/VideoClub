<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;


class CatalogController extends Controller
{
    //
   
    public function index(){
        $arrayPeliculas = Movie::paginate(8);
        //return view("catalog.index",compact('arrayPeliculas','peliculas'));
        return view("catalog.index")->with("peliculas",$arrayPeliculas);
    }

    public function show($id){  
        $pelicula = Movie::findOrFail($id);  
        return view("catalog.show")->with('pelicula',$pelicula)->with('id',$id);       
    }

    public function create(){
        return view("catalog.create");
    }

    public function postCreate(Request $request){
        
        $pelicula = Movie::create([
            'title' => $request->title,
            'year' => $request->year,
            'director' => $request->director,
            'poster'=> $request->poster,
            'rented' => 0,
            'synopsis' => $request->synopsis
        ]);
        $arrayPeliculas = Movie::paginate(8);
        //return view("catalog.index")->with("peliculas",$arrayPeliculas);
        return redirect()->route('catalog')->with("peliculas",$arrayPeliculas);
    }

    public function edit($id){ 
        $pelicula = Movie::findOrFail($id);     
        return view("catalog.edit")->with('pelicula',$pelicula)->with('id',$id);
    }

    public function putEdit(Request $request){
        $peliculaAModificar = Movie::findOrFail($request->id);
        $peliculaAModificar->title = $request->title;
        $peliculaAModificar->year = $request->year;
        $peliculaAModificar->director = $request->director;
        $peliculaAModificar->poster = $request->poster;
        $peliculaAModificar->synopsis = $request->synopsis;
        $peliculaAModificar->save();

        //return view('catalog.edit')->with('pelicula',$peliculaAModificar)->with('id',$request->id)->with('message', 'La película se ha guardado/modificado correctamente');
        return redirect()->route('edit',$request->id)->with('message', 'La película se ha guardado/modificado correctamente');
    }

    public function putRent($id){
        $pelicula = Movie::findOrFail($id);
        $pelicula->rented = 1;
        $pelicula->save();  
        return back()->with('message', 'La película está alquilada');
    }

    public function putReturn($id){
        $pelicula = Movie::findOrFail($id);
        $pelicula->rented = 0;
        $pelicula->save();  
        return back()->with('message', 'La película fue devuelta');
    }

    public function deleteMovie($id){
        $pelicula = Movie::findOrFail($id);
        $pelicula->delete();
        
        $arrayPeliculas = Movie::paginate(8);
        return redirect()->route('catalog')->with("peliculas",$arrayPeliculas)->with('message', 'La película fue eliminada del catálogo');   
    }
}

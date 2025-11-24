<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    //CRUD
    //Listar
    public function listarCategoria(){
        //$categorias = Categoria::all();
        //$categorias = Categoria::orderBy('created_at','asc')->get();
        $categorias = Categoria ::first();

        return response()->json(
        [
            'success' => true,
            'nombre' => 'josue Huarsaya',
            'data'=> $categorias
        ]
        );
    }

    public function agregarCategoria(){

    }

    public function editarCategoria(){
        
    }

    public function eliminarCategoria(){
        
    }
    
}

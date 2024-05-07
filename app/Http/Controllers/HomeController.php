<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class HomeController extends Controller
{
    //
    public function index(Request $request, Produto $produto, Categoria $categoria){
        $produtos = null;
        $categorias = $categoria->all();

        $busca = $request->busca;

        if($busca){
            $produtos = $produto->where('nome', 'like', "%{$busca}%")->orderBy('created_at', 'DESC')->paginate(6)->withQueryString();
        }else{
            $produtos = $produto->orderBy('created_at', 'DESC')->paginate(6);
        }

        return view('home', [
            'produtos' => $produtos,
            'categorias' => $categorias,
            'busca' => $busca
        ]);
    }

    public function categoria(Categoria $categoria, Produto $produto){
        $produtos = $produto->where('categoria_id', '=', $categoria->id)->orderBy('created_at', 'DESC')->paginate(5);
        return view("categoria",[
            "produtos"=> $produtos,
            "categoria" => $categoria
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Http\Requests\StoreUpdateCategoriaRequest;

class CategoriaController extends Controller
{
    //
    public function index(Request $request, Categoria $categoria){
        $categorias = null;
        $busca = $request->busca;

        if($busca){
            $categorias = $categoria->where('nome', 'like', "%{$busca}%")->paginate(2)->withQueryString();
        }else{
            $categorias = $categoria->paginate(2);
        }

        return view('admin.categorias.index', [
            'categorias' => $categorias,
            'busca' => $busca
        ]);
    }

    public function create(Categoria $categoria){
        return view('admin.categorias.form', [
            'categoria' => new Categoria(),
        ]);
    }
    
    public function store(StoreUpdateCategoriaRequest $request, Categoria $categoria){
        $categoria->create($request->validated());
        return redirect()->route('categorias.index');
    }

    public function edit(int $id, Categoria $categoria){
        $categoria = $categoria->where('id', '=', $id)->first();

        if(!$categoria){
            return back();
        }

        return view('admin.categorias.form', [
            'categoria' => $categoria
        ]);
    }
    
    public function update(int $id, StoreUpdateCategoriaRequest $request, Categoria $categoria){
        $categoria = $categoria->where('id', '=', $id)->first();

        if(!$categoria){
            return back();
        }

        $categoria->update($request->validated());

        return redirect()->route('categorias.index');
    }

    public function destroy(int $id, Categoria $categoria){
        $categoria = $categoria->where('id', '=', $id)->first();

        if(!$categoria){
            return back();
        }

        if($categoria->produtos()->count() > 0){
            return redirect()->route('categorias.index')->with('error','A categoria não pode ser excluída porque há produtos vinculados ela');
        }
        
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success','A categoria foi excluída com sucesso');
    }
}

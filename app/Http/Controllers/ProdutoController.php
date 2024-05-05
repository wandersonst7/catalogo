<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateProdutoRequest;
use App\Models\Produto;

class ProdutoController extends Controller
{
    // 
    public function home(Request $request, Produto $produto){
        $produtos = null;
        $busca = $request->busca;

        if($busca){
            $produtos = $produto->where('nome', 'like', "%{$busca}%")->paginate(2)->withQueryString();
        }else{
            $produtos = $produto->paginate(2);
        }

        return view('home', [
            'produtos' => $produtos,
            'busca' => $busca
        ]);
    }
    

    public function index(Request $request, Produto $produto){
        $produtos = null;
        $busca = $request->busca;

        if($busca){
            $produtos = $produto->where('nome', 'like', "%{$busca}%")->paginate(2)->withQueryString();
        }else{
            $produtos = $produto->paginate(2);
        }

        return view('admin.produtos.index', [
            'produtos' => $produtos,
            'busca' => $busca
        ]);
    }

    public function create(){
        return view('admin.produtos.form', [
            'produto' => new Produto()
        ]);
    }

    public function store(StoreUpdateProdutoRequest $request, Produto $produto){
        $data = $this->armazenaImagem($request);
        $produto->create($data);
        return redirect()->route('produtos.index');
    }

    public function edit(int $id, Produto $produto){
        $produto = $produto->where('id', '=', $id)->first();

        if(!$produto){
            return back();
        }

        return view('admin.produtos.form', [
            'produto' => $produto
        ]);
    }
    
    public function update(int $id, StoreUpdateProdutoRequest $request, Produto $produto){
        $produto = $produto->where('id', '=', $id)->first();

        if(!$produto){
            return back();
        }

        $data = $this->armazenaImagem($request);
        $produto->update($data);

        return redirect()->route('produtos.index');
    }

    public function destroy(int $id, Produto $produto){
        $produto = $produto->where('id', '=', $id)->first();

        if(!$produto){
            return back();
        }
        
        $produto->delete();
        return redirect()->route('produtos.index');
    }

    private function armazenaImagem(Request $request){
        $data = $request->all();
        if ($request->file('imagem') != null){
            $path = $request->file('imagem')->store("img");
            $data["imagem"] = $path;
        }
        return $data;
    }

}

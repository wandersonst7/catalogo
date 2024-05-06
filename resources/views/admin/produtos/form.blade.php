@extends('layouts.main')

@if($produto->id)
    @section('title', 'Atualizar Produto')
@else
    @section('title', 'Cadastrar Produto')
@endif

@section('content')

<x-nav-bar :username="Auth::user()->username"></x-nav-bar>

<main class="w-50 p-5">
   
    <h1>Formulário de Produto</h1>

    @if($produto->id)
        <form method="POST" action="{{ route("produtos.update", $produto->id) }}" enctype="multipart/form-data">
        @method('PUT')
    @else
        <form method="POST" action="{{ route("produtos.store") }}" enctype="multipart/form-data">
    @endif

        @csrf

        <div class="mb-2">
            <input class="form-control @error('nome') is-invalid @enderror" type="text" name="nome" placeholder="Nome do produto" value="{{ old('nome', $produto->nome)}}">
            @error('nome')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-2">
            <textarea class="form-control @error('descricao') is-invalid @enderror" name="descricao" id="descricao" cols="30" rows="10" placeholder="Descrição">{{ old('descricao', $produto->descricao) }}</textarea>
            @error('descricao')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-2">
            <input class="form-control @error('quantidade') is-invalid @enderror" type="text" name="quantidade" placeholder="Quantidade no estoque" value="{{ old('quantidade', $produto->quantidade)}}">
            @error('quantidade')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-2">
            <input class="form-control @error('preco') is-invalid @enderror" type="text" name="preco" placeholder="Preço" value="{{ old('preco', $produto->preco) }}">
            @error('preco')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-2">
            <select id="categoria_id" name="categoria_id" class="form-control @error('categoria_id') is-invalid @enderror">
                <option disabled selected>--Selecione uma opcao--</option>
                @foreach ($categorias as $categoria)
                    @if($produto->categoria_id == $categoria->id)
                        <option selected value="{{$categoria->id}}">{{ $categoria->nome }}</option>
                    @else
                        <option value="{{$categoria->id}}">{{ $categoria->nome }}</option>
                    @endif
                    
                @endforeach
            </select>
            @error('categoria_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="row mb-3">
            <label for="imagem" class="col-md-4 col-form-label text-md-end">{{ __('imagem') }}</label>
    
        <div class="col-md-6">
            <input id="imagem" type="file" class="form-control @error('imagem') is-invalid @enderror" 
            name="imagem">
            @error('imagem')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @if ($produto->id)
                <img class="mt-3 rounded" src="{{ asset($produto->imagem)}} " width='200'/>
            @endif
            </div>
        </div>
    
        <button class="btn btn-primary" type="submit">Salvar</button>
            
    </form>
</main>

@endsection

@extends('layouts.main')

@if($categoria->id)
    @section('title', 'Atualizar Produto')
@else
    @section('title', 'Cadastrar Produto')
@endif

@section('content')

<x-nav-bar :username="Auth::user()->username"></x-nav-bar>

<main class="w-50 p-5">
   
    <h1>Formulário de Categoria</h1>

    @if($categoria->id)
        <form method="POST" action="{{ route("categorias.update", $categoria->id) }}" enctype="multipart/form-data">
        @method('PUT')
    @else
        <form method="POST" action="{{ route("categorias.store") }}">
    @endif

        @csrf

        <div class="mb-2">
            <input class="form-control @error('nome') is-invalid @enderror" type="text" name="nome" placeholder="Nome do categoria" value="{{ old('nome', $categoria->nome)}}">
            @error('nome')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    
        <button class="btn btn-primary" type="submit">Salvar</button>
            
    </form>
</main>

@endsection

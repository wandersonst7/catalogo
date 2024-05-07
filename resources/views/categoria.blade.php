@extends('layouts.main')

@section('title', $categoria->nome)

@section('content')

<main class="p-5 container">
    <h3>Categoria: {{ $categoria->nome  }}</h3>

    <div class="py-5">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            @foreach($produtos as $produto)
                <div class="col">
                  <div class="card shadow-sm">
                    <img class="img-card" src="{{ asset($produto->imagem) }}" alt="{{ $produto->nome }}">
                    <div class="card-body">
                      <h5 class="card-title">{{ $produto->nome }}</h5>
                      <p class="card-text">{{ $produto->descricao }}</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <a href="{{ route('produtos.show', $produto->id) }}" class="btn btn-sm btn-outline-success">Visualizar</a>
                        </div>
                        <p class="text-success fw-bold">R$ {{ $produto->preco }}</p>
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach
            
        </div>
    </div> 
    
</main>

@endsection
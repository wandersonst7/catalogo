@extends('layouts.main')

@section('title', 'Início')

@section('content')

<main class="p-5 container">
    
    @if($busca)
        <h3>Buscando por: {{ $busca }}</h3>
    @else
        <h3>Todos os Produtos</h3>
    @endif

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
                      <button type="button" class="btn btn-sm btn-outline-success">Visualizar</button>
                    </div>
                    <p class="text-success fw-bold">R$ {{ $produto->preco }}</p>
                  </div>
                </div>
              </div>
            </div>
        @endforeach
        
        </div>
    </div>    

    {{ $produtos->links() }}
    
</main>

@endsection
@extends('layouts.main')

@section('title', $produto->nome)

@section('content')

<main class="p-5 container">
    <h3>Produto: {{ $produto->nome  }}</h3>
    <small>Categoria: {{ $categoria->nome }}</small>
    <div class="py-5 d-flex column-gap-5">
        <img class="img-visualizar" src="{{ asset($produto->imagem) }}" alt="{{ $produto->nome }}">
        <div class="d-flex flex-column gap-2">
            <p>Descrição: {{ $produto->descricao }}</p>
            <p>Estoque: {{ $produto->quantidade }}</p>
            <h4>Preço: <span class="text-success">R$ {{ $produto->preco }}</span></h4>
            <div class="d-flex column-gap-2">
                <a class="btn btn-warning" href="#">Adicionar ao carrinho</a>
                <a class="btn btn-outline-success" target="_BLANK" href="https://wa.me/558494580627?text=Estou%20interessado(a)%20no%20(s)%20seguinte%20(s)%20item(s):%0A%0A{{ urlencode($produto->nome) }}">Finalizar no Whatsapp</a>
            </div>
        </div>
    </div> 
</main>

@endsection
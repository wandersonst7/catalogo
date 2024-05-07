@extends('layouts.main')

@section('title', 'Início')

@section('content')

<main class="p-5">
    <h1>Dashboard</h1>
    <p>Seja bem-vindo</p>

    <div class="d-flex column-gap-2">
        @can('admin')
            <a class="btn btn-success" href="{{ route('funcionarios.index') }}">Funcionários</a>
            <a class="btn btn-primary" href="{{ route('categorias.index') }}">Categorias</a>
        @endcan
        <a class="btn btn-warning" href="{{ route('produtos.index') }}">Produtos</a>
    </div>

</main>

@endsection
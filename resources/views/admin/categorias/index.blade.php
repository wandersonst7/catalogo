@extends('layouts.main')

@section('title', 'Gerenciar Categorias')

@section('content')

<x-nav-bar :username="Auth::user()->username"></x-nav-bar>

<main class="p-5">
    <h1 class="mb-3">Página de Categorias</h1>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a class="btn btn-success"  href="{{ route("categorias.create") }}">Cadastrar Categoria</a>
        <form action="{{ route('categorias.index') }}"class="input-group w-25">
            <button type="submit" class="btn btn-dark">Pesquisar</button>
            <input type="text" class="form-control" placeholder="Faça uma pesquisa" name="busca" value="{{ old('busca', $busca) }}">
        </form>
    </div>
    
    @if($busca)
        <h4>Buscando por: {{ $busca }}</h4>
    @endif

    @if(session('success'))
        <p class="alert alert-success text-center">{{ session('success')}}</p>
    @endif

    @if(session('error'))
        <p class="alert alert-danger text-center">{{ session('error')}}</p>
    @endif

    <table class="table table-striped table-hover table-bordered">
        <thead class="table-dark">
            <th>Nome</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td>{{ $categoria->nome }}</td>
                <td class="d-flex gap-2">
                    <a class="btn btn-sm btn-primary mb-2" href="{{ route("categorias.edit", $categoria->id) }}">Editar</a>

                    @can('admin')
                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST">
                        @csrf
                        @method("DELETE")
                            <input class="btn btn-sm btn-danger"  type="submit" value="Excluir">
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categorias->links() }}
    
</main>

@endsection

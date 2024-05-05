@extends('layouts.main')

@section('title', 'Gerenciar Funcionarios')

@section('content')

<x-nav-bar :username="Auth::user()->username"></x-nav-bar>

<main class="p-5">
    <h1 class="mb-3">Página de Funcionários</h1>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a class="btn btn-success"  href="{{ route("funcionarios.create") }}">Cadastrar Funcionários</a>
        <form action="{{ route('funcionarios.index') }}"class="input-group w-25">
            <button type="submit" class="btn btn-dark">Pesquisar</button>
            <input type="text" class="form-control" placeholder="Faça uma pesquisa" name="busca" value="{{ old('busca', $busca) }}">
        </form>
    </div>
    
    @if($busca)
        <h4>Buscando por: {{ $busca }}</h4>
    @endif

    <table class="table table-striped table-hover table-bordered">
        <thead class="table-dark">
            <th>Funcionário</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach($funcionarios as $funcionario)
            <tr>
                <td>{{ $funcionario->username }}</td>
                <td class="d-flex gap-2">
                    <a class="btn btn-sm btn-primary mb-2" href="{{ route("funcionarios.edit", $funcionario->id) }}">Editar</a>

                    @can('admin')
                    <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" method="POST">
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

    {{ $funcionarios->links() }}
    
</main>

@endsection

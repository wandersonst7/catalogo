@extends('layouts.main')

@if($funcionario->id)
    @section('title', 'Atualizar Funcionario')
@else
    @section('title', 'Cadastrar Funcionario')
@endif

@section('content')

<x-nav-bar :username="Auth::user()->username"></x-nav-bar>

<main class="w-50 p-5">
   
    <h1>Formulário de Cadastro</h1>

    @if($funcionario->id)
        <form  method="POST" action="{{ route("funcionarios.update", $funcionario->id) }}">
        @method('PUT')
    @else
        <form  method="POST" action="{{ route("funcionarios.store") }}">
    @endif

        @csrf
        <div class="mb-2">
            <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" placeholder="Nome do usuário" value="{{ old('username', $funcionario->username)}}">
            @error('username')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        @if(!$funcionario->id)
            <div class="mb-2">
                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Senha" value="{{ old('password', $funcionario->password) }}">
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        @endif
    
        <button class="btn btn-primary" type="submit">Salvar</button>
            
        </div>
    </form>
</main>

@endsection

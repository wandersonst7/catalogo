@extends('layouts.main')

@section('title', 'Início')

@section('content')

<x-nav-bar :username="Auth::user()->username"></x-nav-bar>

<main class="p-5">
    <h1>Tela Inicial</h1>
    <p>Seja bem-vindo</p>

    <div class="d-flex column-gap-2">
        @can('admin')
            <a class="btn btn-success" href="{{ route('funcionarios.index') }}">Funcionários</a>
        @endcan
        <a class="btn btn-warning" href="{{ route('produtos.index') }}">Produtos</a>
    </div>

    @guest
        <a class="my-5 btn btn-sm btn-outline-success" href="{{ route('login') }}">Login</a>  
    @endguest
    
    @auth
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="my-5 btn btn-sm btn-outline-danger" type="submit">Logout</button>
        </form>   
    @endauth

</main>

@endsection
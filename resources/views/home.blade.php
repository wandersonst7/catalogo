@extends('layouts.main')

@section('title', 'Início')

@section('content')

@auth
    <x-nav-bar :username="Auth::user()->username"></x-nav-bar>
@endauth

@guest
    <div class="px-5 py-2 d-flex w-100 justify-content-end">
        <a class="btn btn-warning" href="{{ route('login') }}">Login</a>
    </div>
@endguest

<main class="p-5">
    <h1 class="mb-3">Todos os Produtos</h1>
    
    @if($busca)
        <h4>Buscando por: {{ $busca }}</h4>
    @endif

    <table class="table table-striped table-hover table-bordered">
        <thead class="table-dark">
            <th>Nome</th>
            <th>Preco</th>
            <th>Quantidade</th>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
            <tr>
                <td>{{ $produto->nome }}</td>
                <td>{{ $produto->preco }}</td>
                <td>{{ $produto->quantidade }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $produtos->links() }}
    
</main>

</main>

@endsection
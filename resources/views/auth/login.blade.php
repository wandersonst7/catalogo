@extends('layouts.main')

@section('title', 'Login')

@section('content')

<section class="w-25 m-auto py-5">
    <h1 class="text-center mb-5">Login</h1>

    <form  action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group mb-2">
            <label class="form-label" for="username">Nome de usuário: </label>
            <input class="@error('username') is-invalid @enderror form-control" type="text" name="username" id="username" value="{{ old('username') }}">

            @error('username')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
            
        </div>
        <div class="form-group  mb-2">
            <label class="form-label" for="password">Senha: </label>
            <input class="@error('password') is-invalid @enderror form-control" type="password" name="password" id="password">

            @error('password')
            <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>
        <button class="w-100 btn btn-outline-success" type="submit">ENTRAR</button>
    </form>
</section>


@endsection
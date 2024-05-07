
<header class="mb-3">
  <div class="p-3 container">
    <div class="d-flex flex-wrap align-items-center justify-content-between" >
      <a class="text-decoration-none text-secondary" href="{{ route('home.index') }}">
        <h2>Catalogo</h2>
      </a>

      <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" action="{{ route('home.index') }}">
        {{-- <input name="busca" type="search" class="form-control" placeholder="Faça uma busca" value="{{ old('busca', $busca) }}"> --}}
        <input name="busca" type="search" class="form-control" placeholder="Faça uma busca">
      </form>

      @if($username) 
        <div class="dropdown text-end">
          <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            @ {{ $username }} 
          </a>
          <ul class="dropdown-menu text-small">
            <li><a class="dropdown-item"  href="{{ route('dashboard') }}">Dashboard</a></li>
            <li>          
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="dropdown-item" type="submit">Logout</button>
              </form>  
            </li>
          </ul>
        </div>
      @else
        <a href="{{ route('login') }}" class="btn btn-outline-success d-block" type="submit">Login</a>
      @endif

    </div>
  </div>


  <nav class="nav-categorias">
    <div class="container mx-auto">
      <ul>
        @foreach($categorias as $categoria)
          <li class="nav-item">
            <a class="nav-link" href="{{ route('categoria.show', $categoria)}}">{{ $categoria->nome }}</a>
          </li>
        @endforeach
      </ul>
    </div>
  </nav>

</header>
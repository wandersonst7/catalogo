<nav class="navbar navbar-light bg-light p-5">
    <div class="form-inline">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">@</span>
        </div>
        <input disabled type="text" class="form-control" aria-describedby="basic-addon1" value="{{ $username }}">
      </div>
    </div>
    <div class="d-flex gap-2">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button class="btn btn-outline-danger" type="submit">Logout</button>
        </form>  
        <a class="btn btn-outline-warning" href="{{ route('dashboard') }}">Dashboard</a>
        <a class="btn btn-outline-primary" href="{{ route('home') }}">Home</a>
    </div>
</nav>
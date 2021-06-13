<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/transferencias')}}">Transferencia bancaria</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/estado')}}">Estado de cuenta</a>
        </li>
      </ul>
    </div>
    <div class="d-flex">
        <a class="btn btn-primary" href="{{url('/salir')}}">Salir</a>
    </divS>
  </div>
</nav>
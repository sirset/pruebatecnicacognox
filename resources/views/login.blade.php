@extends('layout.app')

@section('title', 'login')

@section("content")
<!-- login en rama 2 -->
    <main class="form-signin">
        @if (!empty($errors))
        @foreach($errors as $error)
        <div class="alert alert-danger" role="alert">
            {{$error}}
        </div>
        @endforeach
        @endif
        <form class="text-center" method="POST" action="{{url('ingresar')}}">

            @csrf
            <br>
            <h1 class="mb-3 fw-normal">Inicio</h1>

            <div class="form-floating">
            <input type="text" class="form-control" id="identification" name="identification" placeholder="Identificacion">
            <label for="floatingInput">Identificacion</label>
            </div>
            <div class="form-floating">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <label for="floatingPassword">Password</label>
            </div>

            <br>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Ingresar</button>
            <p class="mt-5 mb-3 text-muted">©2021-Prueba Tecnica</p>
        </form>
    </main>
@endsection


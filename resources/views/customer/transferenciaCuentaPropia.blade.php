@extends('layout.app')

@section('title', 'Cuenta Propias')

@section("content")
    @include("layout.nav")
        <div class="container">
            <div class="row">
                @if (!empty($error))
                <div class="alert alert-danger" role="alert">
                    {{$error}}
                </div>
                @endif
                @if (!empty($success))
                <div class="alert alert-success" role="alert">
                    Se ha realizado la transaccion. # de aprobacion: {{$success}}
                </div>
                @endif
                <div class="card text-dark bg-light mb-3 card-centralizar text-center">
                    <div class="card-body">
                        <form class="d-grid gap-2  mx-auto" method="POST" action="{{url('/transferencias/cuentaspropias')}}">
                            @csrf
                            <select class="form-select" name="accountOrigin" aria-label="Default select example">
                                @if(!empty($accounts))
                                    <option value="0" selected>Selecione su cuenta Origen</option>
                                    @foreach($accounts as $account)
                                        <option value="{{$account->id}}">{{$account->account}}</option>
                                    @endforeach
                                @else
                                    <option selected>No hay cuenta</option>
                                @endif
                            </select>
                            <select class="form-select" name="accountDestination" aria-label="Default select example">
                                @if(!empty($accounts))
                                    <option value="0" selected>Selecione su cuenta destino</option>
                                    @foreach($accounts as $account)
                                        <option value="{{$account->id}}">{{$account->account}}</option>
                                    @endforeach
                                @else
                                    <option selected>No hay cuenta</option>
                                @endif
                            </select>
                            <input type="number" step="0.01" placeholder="Valor" name=valor>
                            <button class="w-100 btn btn-lg btn-primary" type="submit">Transferir</button>
                            <a href="{{url('/transferencias')}}" class="btn btn-primary" >Volver</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @include("layout.footer")
@endsection
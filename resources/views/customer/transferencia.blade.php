@extends('layout.app')

@section('title', 'Tranferencias')

@section("content")
    @include("layout.nav")
        <div class="container">
            <div class="row">
                @if (!empty($error))
                <div class="alert alert-danger" role="alert">
                    {{$error}}
                </div>
                @endif
                <div class="card text-dark bg-light mb-3 card-centralizar text-center">
                    <div class="card-body">
                        <div class="d-grid gap-2  mx-auto">
                            <a href="{{url('/transferencias/cuentaspropias')}}" class="btn btn-primary" >Cuentas Propias </a>
                            <a href="{{url('/transferencias/terceros')}}" class="btn btn-primary" >Transferencia a Cuentas de Terceros</a>
                            <a href="{{url('/home')}}" class="btn btn-primary" >Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @include("layout.footer")
@endsection
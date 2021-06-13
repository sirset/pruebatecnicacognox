@extends('layout.app')

@section('title', 'Home')

@section("content")
    @include("layout.nav")
        <div class="container">
            <div class="row">
                <div class="card text-dark bg-light mb-3 card-centralizar text-center">
                    <div class="card-body">
                        <div class="d-grid gap-2  mx-auto">
                            <a href="{{url('/transferencias')}}" class="btn btn-primary" >transferencia bancaria</a>
                            <a href="{{url('/estado')}}" class="btn btn-primary" >Estado de cuenta</a>
                            <a href="{{url('/salir')}}" class="btn btn-primary" >Salir</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @include("layout.footer")
@endsection
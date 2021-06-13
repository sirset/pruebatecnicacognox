@extends('layout.app')

@section('title', 'Estado')

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
                        <form class="d-grid gap-2  mx-auto" method="POST" action="{{url('estado')}}">
                            @csrf
                            <select class="form-select" name="account" aria-label="Default select example">
                                @if(!empty($accounts))
                                    <option value="0" selected>Selecione su cuenta</option>
                                    @foreach($accounts as $account)
                                        <option value="{{$account->id}}">{{$account->account}}</option>
                                    @endforeach
                                @else
                                    <option selected>No hay cuenta</option>
                                @endif
                            </select>
                            <button class="w-100 btn btn-lg btn-primary" type="submit">consultar estado</button>
                            <a href="{{url('/home')}}" class="btn btn-primary" >Volver</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @include("layout.footer")
@endsection
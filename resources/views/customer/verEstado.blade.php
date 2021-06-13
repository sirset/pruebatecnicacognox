@extends('layout.app')

@section('title', 'Ver estado')

@section("content")
    @include("layout.nav")
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <br>
                    <br>
                    <a href="{{url('/home')}}" class="btn btn-primary" >Volver</a>
                    <br>
                    <br>
                    @if(!empty($account))
                        <h3>Detallado de transacciones.Cuenta  {{$account["account"]}}</h3>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>codigo aprobacion</th>
                                <th>Origen</th>
                                <th>Destino</th>
                                <th>Valor</th>
                                <th>Fecha</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(empty($transactions))
                            <tr>
                                <td colspan="6">No hay transacciones para mostrar</td>
                            </tr>
                            @else
                                @foreach($transactions as $transaction)
                                    @if($accountsOrigin == $transaction['accountOrigine'])
                                        <tr class="table-danger">
                                    @else
                                        <tr class="table-success">
                                    @endif
                                        <td>{{$transaction['codigo']}}</td>
                                        <td>{{$transaction['origen']}}</td>
                                        <td>{{$transaction['destino']}}</td>
                                        <td>{{$transaction['valor']}}</td>
                                        <td>{{$transaction['fecha']}}</td>
                                        @if($accountsOrigin == $transaction['accountOrigine'])
                                            <td>Debito</td>
                                        @else
                                            <td>Credito</td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    @include("layout.footer")
@endsection
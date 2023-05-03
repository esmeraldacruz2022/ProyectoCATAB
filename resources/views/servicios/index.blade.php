@extends('layouts.app')

@section('content')
<div class="container">

    {{-- @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
    {{Session::get('mensaje')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    @endif --}}
<table class="table table-dark">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Servicio</th>
            <th>Detalles</th>
            <th>Costo de Servicio</th>
            <th>Estado</th>
            <th>Acciones | <a href="{{url('servicios/create')}}" class="btn btn-success , d-inline">registrar</a></th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $servicios as $servicio )
            <tr>
            <td>{{$servicio->id}}</td>
            <td>{{$servicio->Servicios}}</td>
            <td>{{$servicio->Detalles}}</td>
            <td>{{$servicio->CostoDeServicio}}</td>
            <td>{{$servicio->Estado}}</td>
            <td>
                <a href="{{url('/servicios/'.$servicio->id.'/edit')}}" class="btn btn-warning">
                    Editar
                </a>

                |

            <form action="{{url('/servicios/'.$servicio->id)}}" class="d-inline" method="post">
                @csrf
                {{method_field('DELETE')}}
            <input type="submit" onclick="return confirm('quieres borrar')" class="btn btn-danger" value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
</div>
@endsection

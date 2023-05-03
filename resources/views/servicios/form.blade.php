@extends('layouts.app')

@section('content')
<div class="container">

<h1>{{$modo}}</h1>
@if(count($errors)>0)

<div class="alert alert-danger" role="alert">
    <ul>
@foreach($errors->all() as $error)
<li>   {{$error}} </li>
@endforeach
</ul>
</div>


 @endif
<div class="form-group">
<label for="Servicios">Servicios</label>
<input type="text" class="form-control" name="Servicios" value="{{isset($servicio->Servicios)?$servicio->Servicios:old('Servicios')}}" id="Servicios">
<br>
<label for="Detalles"  >Detalles</label>
<input type="text" class="form-control" name="Detalles" value="{{isset($servicio->Detalles)?$servicio->Detalles:old('Detalles')}}" id="Detalles">
<br>
<label for="CostoDeServicio" >Costos de Servicios</label>
<input type="text" class="form-control" name="CostoDeServicio" value="{{isset($servicio->CostoDeServicio)?$servicio->CostoDeServicio:old('CostoDeServicio')}}" id="CostoDeServicio">
<br>
<label for="Estado" >Estado</label>
<input type="text" class="form-control" name="Estado" value="{{isset($servicio->Estado)?$servicio->Estado:old('Estado')}}" id="Estado">
<br>
<input type="submit" class="btn btn-success" value="Guardar {{$modo}} ">
<a href="{{url('servicios/')}}" class="btn btn-primary">regresar</a>
</div>
@endsection

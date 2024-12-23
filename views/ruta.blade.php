@extends('app')
@section('encabezado', "Ruta del Reparto")
@section('contenido')
<div class="container mt-3 ">
    <div class="d-flex justify-content-center">
        <div id="miMapa" data-wp="{{ $wp }}" style="width: 650px; height: 420px;"></div>
        <div class="mt-r">
        </div>
    </div>
    <div class="d-flex justify-content-center mt-3">
        <a href="{{ $_SERVER['PHP_SELF'] }}" class="btn btn-warning">Volver</a>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key={{ $_ENV['MAP_API_KEY'] }}" async defer></script>
<script src="js/ruta.js"></script>
@endsection


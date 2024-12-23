@extends('app')
@section('encabezado', "Listado de Repartos")
@section('contenido')
<h4 class="text-center mt-3">Gestión de Repartos</h4>
<div class="container mt-4">
    <form id="nueva-lista-reparto" action="{{ $_SERVER['PHP_SELF'] }}?nueva-lista-repartos=true" method="POST" novalidate>
        <div class="row py-2">
            <div class="col-md-7">
                <div class="input-group">
                    <button type="submit" name="nueva-lista-repartos" class="btn btn-info mx-5"><i class="bi bi-plus mr-1"></i>Nueva Lista de Reparto</button>
                    <input type="date" class="form form-control" id="title" name="fecha" placeholder="Lista de Reparto" autofocus required>
                    <div class="invalid-feedback">
                        La fecha es anterior a la fecha de hoy o ya existe un reparto para esa fecha
                    </div>
                </div>
            </div>
        </div>
    </form>
    @foreach ($listasReparto as $listaReparto) 
    <table class="table mt-2">
        <thead class="bg-secondary">
            <tr>
                <th scope="col" style="width:42rem;">{{ $listaReparto->getNombre() }}</th>
                <th scope="col" class="text-end">
                    <form action="index.php" method="POST" id="acciones-lr">
                        <div class="btn-group" role="group">
                            <input type="hidden" name="lista-reparto-id" value="{{ $listaReparto->getId() }}">
                            <button type="submit" name="pet-nuevo-reparto" class="btn btn-info mr-2 btn-sm"><i class="bi bi-plus me-1"></i>Nuevo</button>
                            <button class="btn btn-success mr-2 btn-sm ordenar"><i class="bi bi-sort-down me-1"></i>ordenar</button>
                            <button type="submit" name="borra-lista-reparto" class="btn btn-danger btn-sm" onclick="return confirm('¿Borrar Lista?')"><i class="bi bi-trash mr-1"></i>Borrar</button>
                        </div>
                    </form>
                </th>
            </tr>
        </thead>
        <tbody id="{{ $listaReparto->getId() }}" style="font-size:0.8rem">
            @if (count($listaReparto->getRepartos()) > 0)
            <tr>
                <td scope="row" colspan="2" class="text-center">
                    <form action="index.php" method="POST">
                        <input type="hidden" name="lista-reparto-id" value="{{ $listaReparto->getId() }}">
                        <button type="submit" name="mapa-ruta-reparto" class="btn btn-info ml-2 btn-sm"><i class="bi bi-geo-alt-fill"></i>Mapa Ruta</button>
                        </div>
                    </form>
                </td>

            </tr>
            @endif
            @foreach ($listaReparto->getRepartos() as $reparto)
            <tr id="{{ $listaReparto->getId() }}-{{ $reparto->getId() }}">
                <td scope="row" class="fw-bold">{{ "{$reparto->getProducto()}, {$reparto->getDireccion()}" }} ({{ "{$reparto->getLat()}, {$reparto->getLon()}" }})</td>
        <input type="hidden" value="{{ "{$reparto->getLat()}, {$reparto->getLon()}" }}">
        <td scope="row" class="text-end">
            <form action="index.php" method="POST" id="acciones-lr">
                <div class="btn-group" role="group">
                    <input type="hidden" name="lista-reparto-id" value="{{ $listaReparto->getId() }}">
                    <input type="hidden" name="reparto-id" value="{{ $reparto->getId() }}">
                    <input type="hidden" name="lat" value="{{ $reparto->getLat() }}">
                    <input type="hidden" name="lon" value="{{ $reparto->getLon() }}">
                    <button type="submit" name="borra-reparto" class="btn btn-danger btn-sm" onclick="return confirm('¿Borrar reparto?')"><i class="bi bi-trash mr-1"></i>Borrar</a></button>
                    <button type="submit" name="mapa-reparto" class="btn btn-info ml-2 btn-sm"><i class="bi bi-geo-alt-fill"></i>Mapa</button>
                </div>
            </form>
        </td>

        </tr>
        @endforeach

        </tbody>
    </table>
    @endforeach
</div>
@endsection
@section('scripts')
<script src="js/ordenar.js"></script>
<script src="js/validarlistareparto.js"></script>
@endsection
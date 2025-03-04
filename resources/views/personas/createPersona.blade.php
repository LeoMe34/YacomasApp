@extends('layouts.app')

@section('content')
    <h2>Registrar Persona</h2>

    <form action="{{ route('personas.store') }}" method="POST">
        @csrf
        <div>
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div>
            <label>Apellido paterno:</label>
            <input type="text" name="apellidoPat" class="form-control" required>
        </div>
        <div>
            <label>Apellido materno:</label>
            <input type="text" name="apellidoMat" class="form-control" required>
        </div>
        <div>
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div>
            <label>Fecha nacimiento:</label>
            <input type="email" name="fechaNacimiento" class="form-control" required>
        </div>
        <div>
            <label>Teléfono:</label>
            <input type="text" name="telefono" class="form-control">
        </div>
        <div>
            <label>Estado:</label>
            <input type="text" name="estado" class="form-control">
        </div>
        <div>
            <label>Ciudad:</label>
            <input type="text" name="estado" class="form-control">
        </div>
        <div>
            <label>Genero:</label>
            <input type="text" name="sexo" class="form-control">
        </div>
        <div>
            <label>Estudio:</label>
            <input type="text" name="estudio" class="form-control">
        </div>
        <div>
            <label>Tipo:</label>
            <input type="text" name="tipoAsist" class="form-control">
        </div>

        <button type="submit" class="btn btn-success mt-2">Guardar</button>
    </form>
@endsection
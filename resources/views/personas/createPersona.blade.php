@extends('layouts.app')

@section('content')
    <h2>Crear Nueva Persona</h2>

    <form action="{{ route('personas.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="form-group">
            <label for="apellidoPat">Apellido Paterno</label>
            <input type="text" class="form-control" id="apellidoPat" name="apellidoPat" required>
        </div>

        <div class="form-group">
            <label for="apellidoMat">Apellido Materno</label>
            <input type="text" class="form-control" id="apellidoMat" name="apellidoMat" required>
        </div>

        <div class="form-group">
            <label for="fechaNacimiento">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono">
        </div>

        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" class="form-control" id="estado" name="estado">
        </div>

        <div class="form-group">
            <label for="ciudad">Ciudad</label>
            <input type="text" class="form-control" id="ciudad" name="ciudad">
        </div>

        <div class="form-group">
            <label for="sexo">Sexo</label>
            <select class="form-control" id="sexo" name="sexo">
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
                <option value="O">Otro</option>
            </select>
        </div>

        <div class="form-group">
            <label for="estudio">Nivel de Estudio</label>
            <select class="form-control" id="estudio" name="estudio">
                @foreach($estudios as $estudio)
                    <option value="{{ $estudio }}">{{ $estudio }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tipoAsist">Tipo de Asistencia</label>
            <select class="form-control" id="tipoAsist" name="tipoAsist">
                @foreach($tiposAsist as $tipoAsist)
                    <option value="{{ $tipoAsist }}">{{ $tipoAsist }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Persona</button>
    </form>
@endsection
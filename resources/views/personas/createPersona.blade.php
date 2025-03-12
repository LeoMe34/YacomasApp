@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-4">{{ isset($persona) ? 'Editar Persona' : 'Crear Nueva Persona' }}</h2>

        <!-- Formulario -->
        <form action="{{ isset($persona) ? route('personas.update', $persona) : route('personas.store') }}" method="POST">
            @csrf
            @if(isset($persona)) @method('PUT') @endif

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre"
                        value="{{ old('nombre', $persona->nombre ?? '') }}" required>
                    @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="apellidoPat" class="form-label">Apellido Paterno</label>
                    <input type="text" class="form-control" id="apellidoPat" name="apellidoPat"
                        value="{{ old('apellidoPat', $persona->apellidoPat ?? '') }}" required>
                    @error('apellidoPat') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="apellidoMat" class="form-label">Apellido Materno</label>
                    <input type="text" class="form-control" id="apellidoMat" name="apellidoMat"
                        value="{{ old('apellidoMat', $persona->apellidoMat ?? '') }}" required>
                    @error('apellidoMat') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento"
                        value="{{ old('fechaNacimiento', $persona->fechaNacimiento ?? '') }}" required>
                    @error('fechaNacimiento') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono"
                        value="{{ old('telefono', $persona->datos_adicio['telefono'] ?? '') }}">
                    @error('telefono') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <input type="text" class="form-control" id="estado" name="estado"
                        value="{{ old('estado', $persona->datos_adicio['estado'] ?? '') }}">
                    @error('estado') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="ciudad" class="form-label">Ciudad</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad"
                        value="{{ old('ciudad', $persona->datos_adicio['ciudad'] ?? '') }}">
                    @error('ciudad') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="sexo" class="form-label">Sexo</label>
                    <select class="form-select" id="sexo" name="sexo">
                        <option value="M" {{ old('sexo', $persona->datos_adicio['sexo'] ?? '') == 'M' ? 'selected' : '' }}>
                            Masculino</option>
                        <option value="F" {{ old('sexo', $persona->datos_adicio['sexo'] ?? '') == 'F' ? 'selected' : '' }}>
                            Femenino</option>
                    </select>
                    @error('sexo') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="estudio" class="form-label">Nivel de Estudio</label>
                    <select class="form-select" id="estudio" name="estudio">
                        <option value="Ninguno" {{ old('estudio', $persona->estudio ?? '') == 'Ninguno' ? 'selected' : '' }}>
                            Ninguno</option>
                        <option value="Tecnico" {{ old('estudio', $persona->estudio ?? '') == 'Tecnico' ? 'selected' : '' }}>
                            Tecnico</option>
                        <option value="Licenciatura" {{ old('estudio', $persona->estudio ?? '') == 'Licenciatura' ? 'selected' : '' }}>Licenciatura</option>
                        <option value="Maestria" {{ old('estudio', $persona->estudio ?? '') == 'Maestria' ? 'selected' : '' }}>Maestria</option>
                        <option value="Doctorado" {{ old('estudio', $persona->estudio ?? '') == 'Doctorado' ? 'selected' : '' }}>Doctorado</option>
                        <option value="Otro" {{ old('estudio', $persona->estudio ?? '') == 'Otro' ? 'selected' : '' }}>
                            Otro</option>
                    </select>
                    @error('estudio') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="tipoAsist" class="form-label">Tipo de Asistencia</label>
                    <select class="form-select" id="tipoAsist" name="tipoAsist">
                        <option value="Docente" {{ old('tipoAsist', $persona->tipoAsist ?? '') == 'Docente' ? 'selected' : '' }}>Docente</option>
                        <option value="Estudiante" {{ old('tipoAsist', $persona->tipoAsist ?? '') == 'Estudiante' ? 'selected' : '' }}>Estudiante</option>
                        <option value="Academico" {{ old('tipoAsist', $persona->tipoAsist ?? '') == 'Academico' ? 'selected' : '' }}>Academico</option>
                        <option value="Publico general" {{ old('tipoAsist', $persona->tipoAsist ?? '') == 'Publico general' ? 'selected' : '' }}>Publico general</option>
                    </select>
                    @error('tipoAsist') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <button type="submit"
                class="btn btn-success">{{ isset($persona) ? 'Actualizar Persona' : 'Crear Persona' }}</button>
        </form>
    </div>
@endsection
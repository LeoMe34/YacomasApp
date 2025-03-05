@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-4">Lista de Personas</h2>
        <a href="{{ route('personas.create') }}" class="btn btn-primary mb-3">Nueva Persona</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>Fecha nacimiento</th>
                    <th>Telefono</th>
                    <th>Estado</th>
                    <th>Ciudad</th>
                    <th>Sexo</th>
                    <th>Estudio</th>
                    <th>Asistencia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($personas as $persona)
                            @php
                                $datosAdicio = json_decode($persona->datos_adicio, true);
                            @endphp
                            <tr>
                                <td>{{ $persona->nombre }}</td>
                                <td>{{ $persona->apellidoPat }}</td>
                                <td>{{ $persona->apellidoMat }}</td>
                                <td>{{ $persona->fechaNacimiento }}</td>
                                <td>{{ $datosAdicio['telefono'] ?? 'N/A' }}</td>
                                <td>{{ $datosAdicio['estado'] ?? 'N/A' }}</td>
                                <td>{{ $datosAdicio['ciudad'] ?? 'N/A' }}</td>
                                <td>{{ $datosAdicio['sexo'] ?? 'N/A' }}</td>
                                <td>{{ $persona->estudio ?? 'N/A' }}</td>
                                <td>{{ $persona->tipoAsist ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('personas.edit', $persona) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('personas.destroy', $persona) }}" method="POST" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Eliminar esta persona?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
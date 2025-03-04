@extends('layouts.app')

@section('content')
    <h2>Lista de Personas</h2>
    <a href="{{ route('personas.create') }}" class="btn btn-primary">Nueva Persona</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
        @foreach($personas as $persona)
            <tr>
                <td>{{ $persona->nombre }}</td>
                <td>{{ $persona->email }}</td>
                <td>{{ $persona->informacion_adicional['telefono'] ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('personas.edit', $persona) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('personas.destroy', $persona) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('¿Eliminar esta persona?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
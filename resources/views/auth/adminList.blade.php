@extends('layouts.adminBarra')

@section('content')
    <div class="content-fluid">
        <h2 class="my-4">Lista de Administradores</h2>
        <a href="{{ route('register') }}" class="btn btn-primary mb-3">Nuevo Adminstrador</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form method="GET" action="{{ route('auth.adminList') }}" class="mb-3">
            <label for="rango">Filtrar por Rango:</label>
            <select name="rango" id="rango" class="form-select d-inline-block w-auto">
                <option value="">Todos</option>
                <option value="Total" {{ request('rango') == 'Total' ? 'selected' : '' }}>Total</option>
                <option value="Parcial" {{ request('rango') == 'Parcial' ? 'selected' : '' }}>Parcial</option>
                <option value="Evaluador" {{ request('rango') == 'Evaluador' ? 'selected' : '' }}>Evaluador</option>
                <option value="Registro" {{ request('rango') == 'Registro' ? 'selected' : '' }}>Registro</option>
                <option value="Caja" {{ request('rango') == 'Caja' ? 'selected' : '' }}>Caja</option>
            </select>
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </form>

        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Correo electronico</th>
                    <th>Rango</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)

                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->rango }}</td>
                        <td>
                            <a href="{{ route('auth.adminEdit', $user->id) }}" class="btn btn-warning btn-sm">Editar</a>

                            <form action="{{ route('auth.destroy', $user->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('¿Seguro que quieres eliminar este usuario?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
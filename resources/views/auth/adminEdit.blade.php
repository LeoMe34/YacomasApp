@extends('layouts.adminBarra')

@section('content')
    <div class="container">
        <h2>Editar Usuario</h2>

        <form action="{{ route('auth.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Rango</label>
                <select class="form-select" name="rango">
                    <option value="Total" {{ $user->rango == 'Total' ? 'selected' : '' }}>Total</option>
                    <option value="Parcial" {{ $user->rango == 'Parcial' ? 'selected' : '' }}>Parcial</option>
                    <option value="Evaluador" {{ $user->rango == 'Evaluador' ? 'selected' : '' }}>Evaluador</option>
                    <option value="Registro" {{ $user->rango == 'Registro' ? 'selected' : '' }}>Registro</option>
                    <option value="Caja" {{ $user->rango == 'Caja' ? 'selected' : '' }}>Caja</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('auth.adminList') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
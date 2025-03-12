@extends('layouts.adminBarra')

@section('title', 'Registrar Usuario')

@section('content')
    <div class="content-fluid">
        <h2>Registrar Usuario</h2>

        @if (session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                @error('name')            <p class="text-danger">{{ $message }}</p> @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                @error('email')            <p class="text-danger">{{ $message }}</p> @enderror
            </div>

            <div class="mb-3">
                <label for="rango" class="form-label">Rango</label>
                <select class="form-select" id="rango" name="rango">
                    <option value="Total" {{ old('rango', $user->rango ?? '') == 'Total' ? 'selected' : '' }}>Total</option>
                    <option value="Parcial" {{ old('rango', $user->rango ?? '') == 'Parcial' ? 'selected' : '' }}>Parcial
                    </option>
                    <option value="Evaluador" {{ old('rango', $user->rango ?? '') == 'Evaluador' ? 'selected' : '' }}>
                        Evaluador</option>
                    <option value="Registro" {{ old('rango', $user->rango ?? '') == 'Registro' ? 'selected' : '' }}>Registro
                    </option>
                    <option value="Caja" {{ old('rango', $user->rango ?? '') == 'Caja' ? 'selected' : '' }}>Caja</option>
                </select>
            </div>


            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" required>
                @error('password')        <p class="text-danger">{{ $message }}</p> @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" class="form-control" required>
                @error('password_confirmation')           <p class="text-danger">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
@endsection
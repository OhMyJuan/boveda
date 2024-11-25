<!-- resources/views/passwords/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Contraseña</h1>
        <form action="{{ route('passwords.update', $password) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="service_name">Nombre del Servicio</label>
                <input type="text" name="service_name" id="service_name" class="form-control" value="{{ $password->service_name }}" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
        </form>
    </div>
@endsection

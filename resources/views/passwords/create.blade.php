@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="display-6 m-4">Agregar Nueva Contraseña</h1>
        <form action="{{ route('passwords.store') }}" method="POST" class="w-50 m-auto mt-4">
            @csrf
            <!-- Servicio -->
            <div class="input-group mb-3 w-75 m-auto">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="service_name">Servicio</label>
                </div>
                <input type="text" name="service_name" id="service_name" class="form-control" required>
            </div>

            <!-- Contraseña -->
            <div class="input-group mb-3 w-75 m-auto">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="password">Contraseña</label>
                </div>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <!-- URL -->
            <div class="input-group mb-3 w-75 m-auto">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="url">URL</label>
                </div>
                <input type="url" name="url" id="url" class="form-control">
            </div>

            <!-- Carpeta -->
            <div class="input-group mb-3 w-50 m-auto">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="folder_id">Carpeta</label>
                </div>
                <select class="custom-select" id="folder_id" name="folder_id">
                    @foreach ($folders as $folder)
                        <option value="{{ $folder->id }}">{{ $folder->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-5 m-auto d-block">Guardar</button>

        </form>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mis Contraseñas</h1>
        <a href="{{ route('passwords.create') }}" class="btn btn-primary">Nueva Contraseña</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Servicio</th>
                    <th>Contraseña</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($passwords as $password)
                    <tr>
                        <td>{{ $password->service_name }}</td>
                        <td>{{ $password->encrypted_password }}</td>
                        <td>
                            <a href="{{ route('passwords.edit', $password) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('passwords.destroy', $password) }}" method="POST" style="display:inline;">
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

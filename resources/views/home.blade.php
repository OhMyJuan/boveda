@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="display-6 mb-5">Bienvenido, {{ $usuario->name }}</h1>


    <!-- Tabla de servicios -->
    <div class="row h-100">
        <div class="col-8 h-100">
            <div class="card">
                <h3 class="display-6">Carpeta: {{ $folders->firstWhere('id', $selectedFolderId)->nombre ?? 'N/A' }}</h3>
            @if(isset($passwords))
                @if (count($passwords) > 0)
                    <form action="{{ route('folders.destroy', $folders->firstWhere('id', $selectedFolderId)->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta carpeta?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Borrar Carpeta</button>
                    </form>
                @endif
                <ul class="list-group list-group-flush">

                    @foreach($passwords as $password)
                        <li class="list-group-item row">
                            <a href="" class="d-block border text-dark p-2" style="text-decoration:none;">
                                <div class="col">{{ $password->service_name }}</div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p></p>
            @endif
              </ul>
            </div>

        </div>


        <div class="col-1"></div>

        <div class="col-3 border">
            <div class="position-sticky" style="top: 20px;">
                <div class="container p-1">
                    <div class="row mb-1">
                        <a href="{{ route('passwords.create') }}" class="d-flex justify-content-between align-items-center btn btn-primary w-100 px-2">
                            <span>Añadir contraseña</span>
                            <span class="fs-5 badge bg-light rounded-pill text-primary">+</span>
                        </a>
                    </div>
                    <div class="row">
                        <button type="button" class="d-flex justify-content-between align-items-center btn btn-secondary w-100 px-2" data-bs-toggle="modal" data-bs-target="#createFolderModal">
                            Nueva Carpeta
                        </button>
                    </div>
                    <div class="row">
                        <ul>
                            @foreach ($folders as $folder)
                                    <li class="list-group-item p-2 mt-1 folder d-flex justify-content-between align-items-center">

                                    <a href="{{ route('home.folder', ['folder_id' => $folder->id]) }}" class="btn btn-link">
                                        {{ $folder->nombre }}
                                    </a>
                                    <span class="badge bg-primary rounded-pill d-block">{{ $folder->passwords_count }}</span>
                                    </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="createFolderModal" tabindex="-1" aria-labelledby="createFolderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createFolderModalLabel">Crear Carpeta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario para crear la carpeta -->
                <form action="{{ route('folders.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="folder_name" class="form-label">Nombre de la Carpeta</label>
                        <input type="text" class="form-control" id="folder_name" name="folder_name" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <style>
        .folder:hover {
            background: #0001;
        }
    </style>
@endsection
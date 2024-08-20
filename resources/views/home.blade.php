@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Columna para la lista de estudiantes -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lista de Estudiantes') }}</div>

                <div class="card-body">
                    <div style="max-height: 400px; overflow-y: auto;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->birth_city }}</td>
                                        <td>{{ $student->program }}</td>
                                        <td>
                                            <!-- Botón para editar -->
                                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Editar</a>
                                            <!-- Formulario para eliminar -->
                                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Columna para las alertas -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Alertas') }}</div>

                <div class="card-body">
                    <ul class="list-group">

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

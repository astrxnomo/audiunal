@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row ">
        <!-- Columna para la lista de estudiantes -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Estudiantes') }}</div>

                <div class="card-body">
                    <div style="max-height: 400px; overflow-y: auto;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nacionalidad</th>
                                    <th>Departamento</th>
                                    <th>Ciudad</th>
                                    <th>Edad</th>
                                    <th>Genero</th>
                                    <th>Estrato</th>
                                    <th>PBM</th>
                                    <th>Admisión</th>
                                    <th>Facultad</th>
                                    <th>Programa</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->nationality }}</td>
                                        <td>{{ $student->birth_department }}</td>
                                        <td>{{ $student->birth_city }}</td>
                                        <td>{{ $student->age }}</td>
                                        <td>{{ $student->gender }}</td>
                                        <td>{{ $student->stratum }}</td>
                                        <td>{{ $student->pbm }}</td>
                                        <td>{{ $student->admission_type }}</td>
                                        <td>{{ $student->faculty }}</td>
                                        <td>{{ $student->program }}</td>
                                        <td>
                                            <!-- Botón para editar -->
                                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Editar</a>
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

                <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                    <ul class="list-group">
                        @forelse($alerts as $alert)
                            <div class="card mb-3 alert alert-warning">
                                <div class="card-body">
                                    <h5 class="card-title text-dark fw-bold">Alerta</h5>
                                    <p>Se han detectado cambios en el siguiente estudiante:</p>
                                    <p class="badge text-bg-warning">ID Estudiante: {{ $alert->student_id }}</p>
                                    <p class="badge text-bg-warning">Modificado por: {{ $alert->user->name }}</p>
                                    <p class="card-text text-dark">{!! $alert->message !!}</p>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-info" role="alert">
                                No hay alertas disponibles.
                            </div>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

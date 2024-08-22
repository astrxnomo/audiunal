<!-- resources/views/students/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Modificar Estudiante') }}</div>


                <div class="card-body ">

                    <form action="{{ route('students.update', $student->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="birth_city">Ciudad de Nacimiento</label>
                            <input type="text" class="form-control" id="birth_city" name="birth_city" value="{{ $student->birth_city }}" required>
                        </div>
                        <div class="form-group">
                            <label for="birth_department">Departamento de Nacimiento</label>
                            <input type="text" class="form-control" id="birth_department" name="birth_department" value="{{ $student->birth_department }}" required>
                        </div>
                        <div class="form-group">
                            <label for="nationality">Nacionalidad</label>
                            <input type="text" class="form-control" id="nationality" name="nationality" value="{{ $student->nationality }}" required>
                        </div>
                        <div class="form-group">
                            <label for="age">Edad</label>
                            <input type="number" class="form-control" id="age" name="age" value="{{ $student->age }}" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Género</label>
                            <input type="text" class="form-control" id="gender" name="gender" value="{{ $student->gender }}" required>
                        </div>
                        <div class="form-group">
                            <label for="stratum">Estrato</label>
                            <input type="text" class="form-control" id="stratum" name="stratum" value="{{ $student->stratum }}" required>
                        </div>
                        <div class="form-group">
                            <label for="pbm">PBM</label>
                            <input type="number" class="form-control" id="pbm" name="pbm" value="{{ $student->pbm }}" required>
                        </div>
                        <div class="form-group">
                            <label for="admission_type">Tipo de Admisión</label>
                            <input type="text" class="form-control" id="admission_type" name="admission_type" value="{{ $student->admission_type }}" required>
                        </div>
                        <div class="form-group">
                            <label for="faculty">Facultad</label>
                            <input type="text" class="form-control" id="faculty" name="faculty" value="{{ $student->faculty }}" required>
                        </div>
                        <div class="form-group">
                            <label for="program">Programa</label>
                            <input type="text" class="form-control" id="program" name="program" value="{{ $student->program }}" required>
                        </div>
                        <button type="submit" class="btn btn-warning mt-3">Guardar cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

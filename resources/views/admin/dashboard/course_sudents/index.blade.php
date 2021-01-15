@extends('admin.init.index')
@section('title')
    Registro de Estudiantes en cursos
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Registros" position="Formulario"></x-content>
        
            @livewire('course-student')
            
        </div>
    </div>
@endsection
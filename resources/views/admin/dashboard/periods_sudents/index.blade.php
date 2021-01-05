@extends('admin.init.index')
@section('title')
    Registro de Estudiantes
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Registros" position="Formulario"></x-content>
        
            @livewire('period-student')
            
        </div>
    </div>
@endsection
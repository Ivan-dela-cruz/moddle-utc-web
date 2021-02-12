@extends('admin.init.index')
@section('title')
    Detalle de la tarea
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Tareas" position="Detalle de la tarea"></x-content>
            @livewire('delivery-task-student')    
        </div>
    </div>
    
@endsection
@extends('admin.init.index')
@section('title')
    Entregas de la tarea
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Tareas" position="Entrega de tareas"></x-content>
            @livewire('delivery-task-student')    
        </div>
    </div>
    
@endsection
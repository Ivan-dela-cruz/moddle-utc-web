@extends('admin.init.index')
@section('title')
    Detalle del curso
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Cursos" position="Detalle"></x-content>
            @livewire('detail-course')    
        </div>
    </div>
    
@endsection
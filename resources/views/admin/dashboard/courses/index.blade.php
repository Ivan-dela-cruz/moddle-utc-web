@extends('admin.init.index')
@section('title')
    Cursos
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Cursos" position="Cursos"></x-content>
           
             @livewire('courses')                
        </div>
    </div>
    
@endsection
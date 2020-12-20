@extends('admin.init.index')
@section('title')
    Accesos
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Accesos" position="Roles & Permisos"></x-content>
          
			@livewire('roles')
		    
        </div>
    </div>
@endsection

@extends('admin.init.index')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Periodos" position="Periodos académicos"></x-content>
            <div class="row">
                @livewire('period')
            </div>
        </div>
    </div>
@endsection

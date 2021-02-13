@extends('admin.init.index')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Tareas" position="Lista de tareas"></x-content>
           @livewire('tasks')
                <!--div class="col-lg-12">
                    <div class="card user-profiles-list">
                        <div class="card-header">
                            <h5> Lista de tareas</h5>
                            @can('create_task')
                            <button class="btn btn-success btn-sm btn-round has-ripple float-lg-right"
                                 data-toggle="modal" data-target="#createModal">
                                <i class="feather icon-plus"></i>
                                Agregar
                            </button>
                            @endcan
                        </div>
                        <div class="card-body">
                            <div class="dt-responsive table-responsive">
                                @livewire('tasks')
                            </div>
                        </div>
                    </div>
                </div -->
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets2/js/plugins/isotope.pkgd.min.js')}}"></script>
    <script>
        // init Isotope
        var $grid = $('.grid').isotope({
            itemSelector: '.element-item',
            layoutMode: 'fitRows',
            getSortData: {
                name: '.name',
                symbol: '.symbol',
                number: '.number parseInt',
                category: '[data-category]',
            }
        });

        // bind filter button click
        $('#filters').on('click', 'button', function() {
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({
                filter: filterValue
            });
        });
        $('#filters-side').on('click', 'button', function() {
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({
                filter: filterValue
            });
        });
        // change active class on buttons
        $('.button-group').each(function(i, buttonGroup) {
            var $buttonGroup = $(buttonGroup);
            $buttonGroup.on('click', 'button', function() {
                $buttonGroup.find('.active').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>
    @endsection


<!-- Required Js -->
<script src="{{asset('assets2/js/vendor-all.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets2/js/plugins/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets2/js/ripple.js')}}" type="text/javascript"></script>
<script src="{{asset('assets2/js/pcoded.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets2/js/menu-setting.js')}}" type="text/javascript"></script>

<!-- Apex Chart -->
<script src="{{asset('assets2/js/plugins/apexcharts.min.js')}}" type="text/javascript"></script>
<!-- custom-chart js -->
<script src="{{asset('assets2/js/pages/dashboard-main.js')}}" type="text/javascript"></script>
<script src="{{asset('sweetalert2/dist/sweetalert2.all.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/axios.min.js')}}" type="text/javascript" ></script>
<!-- datatable Js -->
<script src="{{asset('assets2/js/plugins/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets2/js/plugins/dataTables.bootstrap4.min.js')}}" type="text/javascript"></script>

<script src="{{asset('js/admin/index.js')}}" type="text/javascript" type="text/javascript"></script>
<script src="{{asset('assets2/js/pages/data-styling-custom.js')}}" type="text/javascript"></script>


<!-- select2 Js -->
<script src="{{asset('assets2/js/plugins/select2.full.min.js')}}"></script>
<!-- form-select-custom Js -->
<script src="{{asset('assets2/js/pages/form-select-custom.js')}}"></script>

 @livewireScripts

<script type="text/javascript">

window.livewire.on('subjectStore', () => {
    $('#createModal').modal('hide');
    $('#updateModal').modal('hide');
});

</script>

@yield('scripts')

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
<script src="{{asset('assets2/js/plugins/sweetalert.min.js')}}"></script>
<script src="{{asset('js/axios.min.js')}}" type="text/javascript"></script>
<!-- datatable Js -->
<script src="{{asset('assets2/js/plugins/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets2/js/plugins/dataTables.bootstrap4.min.js')}}" type="text/javascript"></script>

<script src="{{asset('js/admin/index.js')}}" type="text/javascript" type="text/javascript"></script>
<script src="{{asset('assets2/js/pages/data-styling-custom.js')}}" type="text/javascript"></script>


<!-- select2 Js -->
<script src="{{asset('assets2/js/plugins/select2.full.min.js')}}"></script>
<!-- form-select-custom Js -->
<script src="{{asset('assets2/js/pages/form-select-custom.js')}}"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
<script src="{{asset('assets2/js/plugins/moment.min.js')}}"></script>
<script src="{{asset('assets2/js/plugins/daterangepicker.js')}}"></script>
<script src="{{asset('assets2/js/pages/ac-datepicker.js')}}"></script>

<!-- minicolors Js -->
<script src="{{asset('assets2/js/plugins/jquery.minicolors.min.js')}}"></script>
<!-- form-picker-custom Js -->
<script src="{{asset('assets2/js/pages/form-picker-custom.js')}}"></script>

<script src="{{asset('plugins/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('plugins/select2/dist/js/select2.min.js')}}"></script>
<script src="{{asset('assets2/js/plugins/trumbowyg.min.js')}}"></script>
<!-- custom-chart js -->
<script src="{{asset('assets2/js/pages/dashboard-sale.js')}}"></script>

<!-- file-upload Js -->
<script src="{{asset('plugins/dropzone/dist/dropzone.js')}}"></script>
<!-- notification Js -->
<script src="{{asset('assets2/js/plugins/bootstrap-notify.min.js')}}"></script>



@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<x-livewire-alert::scripts />


<script src="{{asset('assets2/js/plugins/ckeditor.js')}}"></script>
<script src="{{asset('js/uploadFileAdpter.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script type="text/javascript">



  /*  function MyCustomUploadAdapterPlugin( editor ) {
        editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
            return new MyUploadAdapter( loader );
        };
    }


    $(window).on('load', function() {
        ClassicEditor.create(document.querySelector('#classic-editor'))
            .then(editor=>{
                editor.model.document.on('change:data',()=>{
                    console.log(editor.getData())
                    document.querySelector("#content").value = editor.getData()
                })
            })
            .catch(error => {
                console.error(error);
            });
    });*/
</script>





<script type="text/javascript">


   /* function MyCustomUploadAdapterPlugin( editor ) {
        editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
            return new MyUploadAdapter( loader );
        };
    }

   window.livewire.on('startEditor', () => {
        ClassicEditor.create(document.querySelector('#classic-editor'))
            .then(editor=>{
                editor.model.document.on('change:data',()=>{
                    console.log(editor.getData())
                    document.querySelector("#content").value = editor.getData()
                })
            })
            .catch(error => {
                console.error(error);
            });
    });*/

    window.livewire.on('taskStore', () => {

        $(".q-view").addClass("active");
      /*  $(".overlay").click(function() {
            $(".q-view").removeClass("active");
        });*/
        $('#storeTaskBtn').removeClass("d-none");
        $('.addTaskDiv').removeClass("d-none");
        $('#addFileBtn').addClass("d-none");
        $('#addFileDiv').addClass("d-none");

    });

   window.livewire.on('taskHide', () => {
        $(".q-view").removeClass("active");
       $('.dz-preview').remove();
       $('.dz-message').show();
   });

   window.livewire.on('changeBtn', () => {
       $('.addTaskDiv').addClass("d-none");
       $('#addFileDiv').removeClass("d-none");
       $('#storeTaskBtn').addClass("d-none");
       $('#addFileBtn').removeClass("d-none");
   });

   window.livewire.on('loadData', () => {
     //  $('.addTaskDiv').addClass("d-none");
       $('#addFileDiv').removeClass("d-none");
       $('#storeTaskBtn').addClass("d-none");
       $('#updateTaskBtn').removeClass("d-none");
       //$('#addFileBtn').removeClass("d-none");
   });

   window.livewire.on('updateData', () => {
       //  $('.addTaskDiv').addClass("d-none");
       $('#addFileDiv').addClass("d-none");
       $('#storeTaskBtn').removeClass("d-none");
       $('#updateTaskBtn').addClass("d-none");
       //$('#addFileBtn').removeClass("d-none");
       $('.dz-preview').remove();
       $('.dz-message').show();
   });



    window.livewire.on('courseStore', () => {
        $('#createModal').modal('hide');
        $('#updateModal').modal('hide');
    });
    window.livewire.on('periodStore', () => {
        $('#createModal').modal('hide');
        $('#updateModal').modal('hide');
    });
    window.livewire.on('subjectStore', () => {
        $('#createModal').modal('hide');
        $('#updateModal').modal('hide');
    });

    window.livewire.on('studentStore', () => {
        $('#createModal').modal('hide');
        $('#updateModal').modal('hide');
    });
    window.livewire.on('teacherStore', () => {
        $('#createModal').modal('hide');
        $('#updateModal').modal('hide');
    });
    window.livewire.on('levelStore', () => {
        $('#createModal').modal('hide');
        $('#updateModal').modal('hide');
    });
    window.livewire.on('taskStore', () => {
        $('#createModal').modal('hide');
        $('#updateModal').modal('hide');
    });
    window.livewire.on('fileStore', () => {
        $('#createModal').modal('hide');
        $('#updateModal').modal('hide');
    });
    window.livewire.on('Success', () => {
        swal("¡Satisfactorio!", "Proceso realizado con exíto", "success");
    });
    window.livewire.on('Warning', () => {
        swal("¡Alvertencia!", "Tu cambio afectará a otros registros", "warning");
    });
    window.livewire.on('Danger', () => {
        swal("¡Error!", "Se produjo un error en la petición", "error");
    });
    window.livewire.on('RoleEdit', () => {
        $('.btn_store_rol').attr('hidden', true);
        $('.btn_update_rol').removeAttr('hidden', 'hidden');
    });
    window.livewire.on('RoleUpdate', () => {
        $('.btn_update_rol').attr('hidden', true);
        $('.btn_store_rol').removeAttr('hidden', 'hidden');
    });

   window.livewire.on('errors',errors => {
       let html = '';
       $(errors).each(function (key, value) {
           html += '<li>'+value+'</li>';
       });
       notify('Solucione los siguientes errores:'+html,'danger')
   });

   function notify(msg,type){
       $.notify({
           message:msg
       }, {
           type: type,
           allow_dismiss: false,
           label: 'Cancel',
           className: 'btn-xs btn-inverse',
           placement: {
               from: 'bottom',
               align: 'left'
           },
           delay: 8000,
           animate: {
               enter: 'animated fadeInRight',
               exit: 'animated fadeOutLeft'
           },
           offset: {
               x: 30,
               y: 30
           }
       });
       return false;
   }

</script>

@yield('scripts')

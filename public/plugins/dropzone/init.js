let task_id;
window.addEventListener('data', event => {
    task_id = event.detail.task_id
});
//   var destroyRoute = document.getElementById('frmDestroyBill').getAttribute('action');
// var loadRoute = document.getElementById('frmLoadBill').getAttribute('action');
let storeRoute = document.getElementById('storeFileFrm').getAttribute('action');
let csrf = document.getElementsByName('token').values();

console.log(task_id);
$('#dropzone').dropzone({
    url: storeRoute,
    addRemoveLinks: true,
    init: function () {
        let thisDropzone = this;
        thisDropzone.on('sending', function (file, xhr, formData) {
            formData.append("_token", "{{ csrf_token() }}");
            formData.append('name', file.name);
            formData.append('task_id', task_id);
        });
    },
    success: function (file, response) {
        console.log('archivo guardado')
        /* toastr.success('La imágen se ha subido correctamente.', '¡Genial!', {
             positionClass: 'toastr toast-top-right',
             containerId: 'toast-top-right',
         });*/
    },
    error: function (file, response) {
        console.log(response);
        console.log('error al subir')
        /*   toastr.error(response, 'Error', {
               positionClass: 'toastr toast-top-right',
               containerId: 'toast-top-right',
           });*/

        return false;
    },
    removedfile: function (file) {
        //console.log(file);
        let name = '';
        if (file.upload) {
            name = file.upload.filename;
        } else {
            name = file.fullname;
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: destroyRoute,
            data: {filename: name},
            success: function (data) {
                console.log('Archivo eliminado');
               /* toastr.info('La imágen se ha eliminado correctamente.', 'Aviso', {
                    positionClass: 'toastr toast-top-right',
                    containerId: 'toast-top-right',
                });*/
            },
            error: function (e) {
                console.log('error al eliminar el archivo')
              /*  toastr.error('No se pudo eliminar la imágen.', 'Error', {
                    positionClass: 'toastr toast-top-right',
                    containerId: 'toast-top-right',
                });*/
            }
        });
        var fileRef;
        return (fileRef = file.previewElement) != null ?
            fileRef.parentNode.removeChild(file.previewElement) : void 0;
    },


    ///messages
    dictDefaultMessage: 'Arrastre las imágenes aquí para subirlas',
    dictFallbackMessage: "Su navegador no admite la carga de archivos mediante la función de arrastrar y soltar.",
    dictFallbackText: "Utilice el formulario de respaldo a continuación para cargar sus archivos como en los viejos tiempos.",
    dictFileTooBig: "El archivo es demasiado grande ({{--filesize--}}MiB). Tamaño máximo de archivo: {{--maxFilesize--}}MiB.",
    dictInvalidFileType: "No puedes subir archivos de este tipo.",
    dictResponseError: "Server responded with {{--statusCode--}} code.",
    dictCancelUpload: "Cancelar carga",
    dictUploadCanceled: "Subida Cancelada.",
    dictCancelUploadConfirmation: "¿Está seguro de que deseas cancelar esta carga?",
    dictRemoveFile: "Remover archivo",
    dictRemoveFileConfirmation: null,
    dictMaxFilesExceeded: "No puedes subir más archivos.",
});


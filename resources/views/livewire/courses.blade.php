<div>
    @include('admin.modals.courses.create')
    @include('admin.modals.courses.edit')
    <div class="row help-desk">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <select wire:model="period_id" class="form-control" name="period_id" id="" aria-label=""
                                        aria-describedby="basic-addon1">
                                    <option value="">Periodo académico</option>
                                    @foreach($periods as $period)
                                        <option value="{{$period->id}}">{{$period->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <select wire:model="level_id" class="form-control" name="level_id" id="" aria-label=""
                                        aria-describedby="basic-addon1">
                                    <option value="">Nivel</option>
                                    @foreach($levels as $level)
                                        <option value="{{$level->id}}">{{$level->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <select class="form-control " wire:model="parallel" name="parallel">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <select wire:model="subject_id" class="form-control" name="subject_id" id=""
                                        aria-label="" aria-describedby="basic-addon1">
                                    <option value="">Materia</option>
                                    @foreach($subjects as $subject)
                                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <nav class="navbar justify-content-between p-0 align-items-center">
                        <h5>Mis cursos</h5>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            @can('create_ac_period')
                                <button class="btn waves-effect waves-light btn-success"
                                        wire:click="create()"
                                        data-toggle="modal" data-target="#createModal">
                                    <i class="feather icon-plus"></i>
                                </button>
                            @endcan
                            <label
                                onclick="$('.help-desk').removeClass('md-view').removeClass('large-view').addClass('sm-view')"
                                class="btn waves-effect waves-light btn-primary">
                                <input type="radio" name="options" id="option1" checked> <i
                                    class="feather icon-align-justify m-0"></i>
                            </label>
                            <label
                                onclick="$('.help-desk').removeClass('sm-view').removeClass('large-view').addClass('md-view')"
                                class="btn waves-effect waves-light btn-primary">
                                <input type="radio" name="options" id="option2"> <i class="feather icon-menu m-0"></i>
                            </label>
                            <label
                                onclick="$('.help-desk').removeClass('md-view').removeClass('sm-view').addClass('large-view')"
                                class="btn waves-effect waves-light btn-primary active">
                                <input type="radio" name="options" id="option3"> <i class="feather icon-grid m-0"></i>
                            </label>
                        </div>
                    </nav>
                </div>
            </div>
            <div hidden>  {{\Carbon\Carbon::setLocale('es')}} </div>
            @foreach($courses as $data)
                <div class="ticket-block">
                    <div class="row">
                        <div class="col-auto">
                            <img wire:click="taskByCourse({{ $data->id }})" class="media-object wid-100"
                                 src="{{asset($data->url_image)}}" alt="Generic placeholder image ">
                        </div>
                        <div class="col">
                            <div wire:click="taskByCourse({{ $data->id }})" class="card hd-body">
                                <div class="row align-items-center">
                                    <div class="col border-right pr-0">
                                        <div class="card-body inner-center">
                                            <div class="ticket-customer font-weight-bold">{{ $data->name }}</div>
                                            <div class="ticket-type-icon private mt-1 mb-1"><i
                                                    class="fas fa-user-graduate text-primary mr-1 f-14"></i>{{ $data->teacher->name}} {{ $data->teacher->last_name}}
                                            </div>
                                            <div class="excerpt mt-4">
                                                {{ $data->description }}
                                            </div>
                                            <ul class="list-inline mt-2 mb-0">
                                                <li class="list-inline-item"><i
                                                        class="fas fa-chart-line mr-1 f-14"></i>{{ $data->level->name }}
                                                </li>
                                                <li class="list-inline-item"><i
                                                        class="fas fa-book mr-1 f-14"></i>{{ $data->subject->name }}
                                                </li>
                                                <li class="list-inline-item"><i
                                                        class="feather icon-clock mr-1 f-14"></i>
                                                        {{ \Carbon\Carbon::parse($data->created_at)->diffForHumans()  }}
                                                </li>

                                            </ul>

                                            <div class="mt-2">

                                                <a href="javascript:void(0);"
                                                   wire:click="openformtask({{ $data->id }})"
                                                   data-toggle="tooltip"
                                                   title="Eliminar"
                                                   class="text-muted mr-3">
                                                    <i class="feather icon-file-text mr-1"></i>Nueva tarea
                                                </a>
                                                <a href="{{route('detailcourses')}}{{'?course='.$data->id}}"
                                                    data-toggle="tooltip"
                                                    title="Eliminar"
                                                    class="text-muted">
                                                    <i class="fas fa-book-open mr-1"></i>Detalle
                                                </a>
                                                
                                                @can('update_course')
                                                    <a href="javascript:void(0);" wire:click="edit({{ $data->id }})"
                                                       class="text-muted float-right"
                                                       type="button"
                                                       data-toggle="modal" data-target="#updateModal">
                                                        <i class="feather icon-edit-1"></i>
                                                        Editar
                                                    </a>
                                                @endcan
                                                @can('destroy_course')
                                                    <a href="javascript:void(0);"
                                                       wire:click="delete({{ $data->id }})"
                                                       data-toggle="tooltip"
                                                       title="Eliminar"
                                                       class="text-muted float-right mr-3">
                                                        <i class="feather icon-trash-2 mr-1"></i>Eliminar
                                                    </a>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto pl-0 right-icon">
                                        <div class="card-body">
                                            <ul class="list-unstyled mb-0">
                                                <li><a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                       data-original-title="tooltip on top" class="active"><i
                                                            class="feather icon-star text-warning"></i></a></li>
                                                <li><a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                       data-original-title="tooltip on top"><i
                                                            class="feather icon-circle text-info"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-xl-4 col-lg-12">
            <div class="right-side">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="justify-content-between">
                            <span >Listado de tareas para </span>
                            @foreach($courses as $course)
                                @if($course->id == $course_id_t )
                                    <span class="text-muted">{{$course->name}}</span>
                                    <span class="rounded-circle badge badge-info">{{$tasks->count()}} </span>
                                @endif
                            @endforeach


                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="cat-list">
                            @foreach($tasks as $task)
                                <div class="border-bottom pb-3 ">
                                    <div class="d-inline-block">
                                        <img src="{{asset($task->url_image)}}" alt=""
                                             class="wid-20 rounded mr-1 img-fluid">
                                        <a href="javascript:void(0);">{{$task->name}}</a>
                                    </div>
                                    <div class="float-right span-content">

                                        <a href="javascript:void(0);"
                                           class="btn waves-effect waves-light btn-default {{$task->status == 1 ? 'badge-success':'badge-danger'}} rounded-circle mr-0 "
                                           data-toggle="tooltip"
                                           data-placement="top"
                                           title="Entrega {{$task->end_date}}"
                                           data-original-title="{{$task->start_date}} - {{$task->end_date}}">
                                            <i style="width: 15px; height: 15px;"
                                               class="{{$task->status == 1 ? 'feather icon-check':'feather icon-x'}}"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header pt-4 pb-4">
                        <h5>Estudiantes por materia</h5>
                    </div>
                    <div class="card-body p-3">
                        <div class="cat-list">
                            @foreach($students as $student)
                                <div class="border-bottom pb-3 ">
                                    <div class="d-inline-block">
                                        <img src="{{asset($student->url_image)}}" alt=""
                                             class="wid-20 rounded mr-1 img-fluid">
                                        <a href="javascript:void(0);">{{$student->name}} {{$student->last_name}}</a>
                                    </div>
                                    <div class="float-right span-content">
                                        <a href="#"
                                           class="btn waves-effect waves-light btn-default badge-danger rounded-circle mr-1"
                                           data-toggle="tooltip" data-placement="top" title=""
                                           data-original-title="tooltip on top">1</a>
                                        <a href="#"
                                           class="btn waves-effect waves-light btn-default badge-secondary rounded-circle mr-0 "
                                           data-toggle="tooltip" data-placement="top" title=""
                                           data-original-title="tooltip on top">3</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @if($courses->count() > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <h6>Mis Cursos</h6>
                            <hr>
                            <div class="form-group">
                                {{$courses->links()}}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @include('admin.modals.courses.new-task')

    @section('scripts')
        <script>
            $('.summernote').summernote({
                dialogsInBody: true,
                tabsize: 2,
                height: 150,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {
                    onChange: function (contents, $editable) {
                        console.log("cambio");
                    @this.set('content', contents);
                    },
                }
            });

            window.livewire.on('loadData', () => {
                $(".summernote").eq(1).summernote("code", @this.get('content'));
            });

            $(document).on("show.bs.modal", '.modal', function (event) {
                console.log("Global show.bs.modal fire");
                var zIndex = 100000 + (10 * $(".modal:visible").length);
                $(this).css("z-index", zIndex);
                setTimeout(function () {
                    $(".modal-backdrop").not(".modal-stack").first().css("z-index", zIndex - 1).addClass("modal-stack");
                }, 0);
            }).on("hidden.bs.modal", '.modal', function (event) {
                console.log("Global hidden.bs.modal fire");
                $(".modal:visible").length && $("body").addClass("modal-open");
            });
            $(document).on('inserted.bs.tooltip', function (event) {
                console.log("Global show.bs.tooltip fire");
                var zIndex = 100000 + (10 * $(".modal:visible").length);
                var tooltipId = $(event.target).attr("aria-describedby");
                $("#" + tooltipId).css("z-index", zIndex);
            });
            $(document).on('inserted.bs.popover', function (event) {
                console.log("Global inserted.bs.popover fire");
                var zIndex = 100000 + (10 * $(".modal:visible").length);
                var popoverId = $(event.target).attr("aria-describedby");
                $("#" + popoverId).css("z-index", zIndex);
            });

        </script>

        <script>
            let task_id;
            window.addEventListener('data', event => {
                task_id = event.detail.task_id
            });
            let destroyRoute = document.getElementById('destroyFileFrm').getAttribute('action');
            // var loadRoute = document.getElementById('frmLoadBill').getAttribute('action');
            let storeRoute = document.getElementById('storeFileFrm').getAttribute('action');
            let csrf = document.getElementsByName('token').values();

            Dropzone.autoDiscover = false;
            $('#dropzone').dropzone({
                url: storeRoute,
                maxFilesize: 2,
                addRemoveLinks: true,
                init: function () {
                    let thisDropzone = this;
                    thisDropzone.on('sending', function (file, xhr, formData) {
                        formData.append("_token", "{{ csrf_token() }}");
                        formData.append('name', file.name);
                        formData.append('task_id', task_id);
                    });
                    thisDropzone.on("uploadprogress", function () {
                        $('.dz-message').hide();
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
                    console.log('error al subir');
                    file.previewElement.remove();
                    $.notify({
                        message:'El archivo es demasiado grande. Tamaño máximo de archivo: 2MB.'
                    }, {
                        type: 'danger',
                        allow_dismiss: false,
                        label: 'Cancel',
                        className: 'btn-xs btn-inverse',
                        placement: {
                            from: 'bottom',
                            align: 'left'
                        },
                        delay: 6000,
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
                },
                renameFile: function (file) {
                    let dt = new Date();
                    var time = dt.getTime();
                    return time + " - "+file.name;
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
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        url: destroyRoute,
                        data: {filename: name},
                        success: function (data) {
                            console.log('archivo eliminado');
                            /*    toastr.info('La imágen se ha eliminado correctamente.', 'Aviso', {
                                positionClass: 'toastr toast-top-right',
                                containerId: 'toast-top-right',
                            });*/
                        },
                        error: function (e) {
                            console.log('error al eliminar el archivo');
                            /*toastr.error('No se pudo eliminar la imágen.', 'Error', {
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
                dictFallbackMessage: "Su navegador no admite la carga de archivos mediante la función de arrastrar y soltar.",
                dictFallbackText: "Utilice el formulario de respaldo a continuación para cargar sus archivos como en los viejos tiempos.",
                dictInvalidFileType: "No puedes subir archivos de este tipo.",
                dictResponseError: "Server responded with {{--statusCode--}} code.",
                dictCancelUpload: "Cancelar carga",
                dictUploadCanceled: "Subida Cancelada.",
                dictCancelUploadConfirmation: "¿Está seguro de que deseas cancelar esta carga?",
                dictRemoveFile: "Eliminar archivo",
                dictRemoveFileConfirmation: null,
                dictMaxFilesExceeded: "No puedes subir más archivos.",
            });


        </script>
    @endsection
</div>

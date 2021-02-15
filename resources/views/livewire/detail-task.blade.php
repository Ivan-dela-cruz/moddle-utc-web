<div>
    <div class="col-md-12">
        <p hidden> {{$st = \Illuminate\Support\Facades\Auth::user()->student}}</p>
    
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills bg-nav-pills nav-justified mb-0">
                    <li class="nav-item">
                        <a wire:click="loadDataDetail({{ $task->id }})" href="#detail_c" data-toggle="tab"
                           aria-expanded="{{$position == 'detail_c'?true:false}}"
                           class="nav-link {{$position == 'detail_c'?'active':''}}">
                            <i class="fas fa-file-alt f-18"></i>
                            <span class="d-none d-lg-inline-block m-l-10">Información</span>
                        </a>
                    </li>
                   <p hidden>{{$del_st = $st->taskdeliveries()->where('task_id',$task_id)->get()}}</p>
                    @if (count($del_st)<=0)
                        <li class="nav-item">
                            <a wire:click="loadNewTask({{ $task->id }})" href="#new_task" data-toggle="tab"
                            aria-expanded="{{$position == 'new_task'?true:false}}"
                            class="nav-link {{$position == 'new_task'?'active':''}}">
                                <i class="fas fa-cloud-upload-alt f-18"></i>
                                <span class="d-none d-lg-inline-block m-l-10">Entrega</span>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a wire:click="loadDataTask({{ $task->id }})" href="#task_c" data-toggle="tab"
                           aria-expanded="{{$position == 'task_c'?true:false}}"
                           class="nav-link {{$position == 'task_c'?'active':''}} ">
                            <i class="fas fa-list-alt f-18"></i>
                            <span class="d-none d-lg-inline-block m-l-10">Tareas</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane {{$position == 'detail_c'?'show active':''}}" id="detail_c">
                <div class="row">
                    <!-- customar project  start -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <form class="pl-lg-4">
                                            <h6 class="text-muted">{{$course->name}}</h6>
                                            <h3 class="mt-0">{{$task->name}} <a href="javascript: void(0);"
                                                                                  class="text-muted"><i
                                                        class="mdi mdi-square-edit-outline ml-2"></i></a></h3>
                                            <p class="mb-1">Publicado {{\Carbon\Carbon::parse($task->created_at)->isoFormat('dddd, MMMM D, YYYY')}}</p>
                                           

                                            <div class="mt-4">
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <div class="media">
                                                            <i class="fas fa-university text-info mr-2 mt-2"></i>
                                                            <div class="media-body">
                                                                <strong class="">Periodo Académico</strong>
                                                                <span>{{$course->academic_period->name}}</span>

                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mt-2">
                                                        <div class="media">
                                                            <i class="fas fa-level-down-alt text-success mr-2 mt-2"></i>
                                                            <div class="media-body">
                                                                <strong class="">Nivel</strong>
                                                                <span>{{$course->level->name}}</span>

                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mt-2">
                                                        <div class="media">
                                                            <i class="fas fa-book text-success mr-2 mt-2"></i>
                                                            <div class="media-body">
                                                                <strong class="">Asignatura</strong>
                                                                <span>{{$course->subject->name}}</span>

                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mt-2">
                                                        <div class="media">
                                                            <i class="fas fa-book-reader text-primary mr-2 mt-2"></i>
                                                            <div class="media-body">
                                                                <strong class="">Curso</strong>
                                                                <span>{{$course->name}}</span>

                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mt-2">
                                                        <div class="media">
                                                            <i class="fas fa-user-graduate text-secondary mr-2 mt-2"></i>
                                                            <div class="media-body">
                                                                <strong class="">Docente a cargo </strong>
                                                                <span>{{$course->teacher->profession}} {{$course->teacher->name}} {{$course->teacher->last_name}}</span>

                                                            </div>
                                                        </div>
                                                    </li>
                                                    <div hidden>  {{\Carbon\Carbon::setLocale('es')}} </div>
                                                    <li class="mt-2">
                                                        <div class="media">
                                                            <i class="fas fa-clock  mr-2 mt-2 text-muted"></i>
                                                            <div class="media-body">
                                                                <strong class="">Fecha de inicio </strong>
                                                                <span>{{\Carbon\Carbon::parse($task->start_date)->isoFormat('dddd, MMMM D, YYYY')}} </span>

                                                            </div>
                                                        </div>
                                                    </li>
                                                    @php($endtimes = \Carbon\Carbon::parse($task->end_time))
                                                    @php($enddates = \Carbon\Carbon::parse($task->end_date))
                                                    @php($final_date =  \Carbon\Carbon::parse($enddates->format('Y-m-d')." ".$endtimes->format('H:i:s')))
                                                    <li class="mt-2">
                                                        <div class="media">
                                                            <i class="fas fa-clock mr-2 mt-2 {{$final_date->isPast()?'text-danger':'text-warning'}}"></i>
                                                            <div class="media-body {{$final_date->isPast()?'text-danger':''}}">
                                                                <strong class="">Fecha y hora de entrega </strong>
                                                                <span>{{$final_date->isoFormat('dddd, MMMM D, YYYY h:mm')}}</span>

                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mt-2">
                                                        <div class="media">
                                                            <i class="fas fa-tag text-success mr-2 mt-2"></i>
                                                            <div class="media-body">
                                                                <strong class="">Estado de la tarea</strong>
                                                                <span class="badge badge-pill {{$final_date->isPast()?'badge-danger':'badge-info'}} ">{{$task->status}}</span>

                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="pl-lg-4 mt-4">
                                            <h6>Descripción:</h6>
                                            <p>{{$course->description}}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- customar project  end -->
                </div>
            </div>
            <div class="tab-pane {{$position == 'task_c'?'show active':''}}" id="task_c">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 filter-bar">
                        <h5>{{$course->name}}&nbsp;&nbsp;<span class="text-muted">(Lista de tareas)</span></h5>
                        <nav class="navbar m-b-30 p-10">
                            <ul class="nav">
                                <li class="nav-item f-text active">
                                    <a class="nav-link text-secondary" href="javascript: void(0);">Filtrar por: <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-secondary" href="javascript: void(0);"
                                       id="bydate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                            class="far fa-clock"></i> Fechas</a>
                                        <div class="dropdown-menu" aria-labelledby="bydate">
                                            <a wire:click="getTime('')" class="dropdown-item {{$timeWhere == '' ? 'active': ''}}" href="javascript: void(0);">Ver todos</a>
                                            <div class="dropdown-divider"></div>
                                            <a wire:click="getTime('day')" class="dropdown-item {{$timeWhere == 'day' ? 'active': ''}}" href="javascript: void(0);">Hoy</a>
                                            <a wire:click="getTime('yesterday')" class="dropdown-item {{$timeWhere == 'yesterday' ? 'active': ''}}" href="javascript: void(0);">Ayer</a>
                                            <a wire:click="getTime('week')" class="dropdown-item {{$timeWhere == 'week' ? 'active': ''}}" href="javascript: void(0);">Esta semana</a>
                                            <a wire:click="getTime('month')" class="dropdown-item {{$timeWhere == 'month' ? 'active': ''}}" href="javascript: void(0);">Este mes</a>
                                            <a wire:click="getTime('year')" class="dropdown-item {{$timeWhere == 'year' ? 'active': ''}}" href="javascript: void(0);">Este año</a>
                                        </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-secondary" href="javascript: void(0);"
                                       id="bystatus" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false"><i class="fas fa-chart-line"></i>Estados</a>
                                    <div class="dropdown-menu" aria-labelledby="bystatus">
                                        <a class="dropdown-item {{$task_status == '' ? 'active': ''}}" wire:click="filterByStatus('')" href="javascript: void(0);">Ver todos</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item {{$task_status == 'Abierto' ? 'active': ''}}" wire:click="filterByStatus('Abierto')" href="javascript: void(0);">Abierto</a>
                                        <a class="dropdown-item {{$task_status == 'Cancelado' ? 'active': ''}}" wire:click="filterByStatus('Cancelado')" href="javascript: void(0);">Cancelado</a>
                                        <a class="dropdown-item {{$task_status == 'Finalizado' ? 'active': ''}}" wire:click="filterByStatus('Finalizado')" href="javascript: void(0);">Finalizado</a>
                                        <a class="dropdown-item {{$task_status == 'Atrasado' ? 'active': ''}}" wire:click="filterByStatus('Atrasado')" href="javascript: void(0);">Atrasado</a>
                                    </div>
                                </li>

                            </ul>
                        </nav>

                        <div class="row">
                            <div hidden>  {{\Carbon\Carbon::setLocale('es')}} </div>
                            @foreach($tasks as $t)
                                @php($endtimes = \Carbon\Carbon::parse($t->end_time))
                                @php($enddates = \Carbon\Carbon::parse($t->end_date))
                                @php($final_date =  \Carbon\Carbon::parse($enddates->format('Y-m-d')." ".$endtimes->format('H:i:s')))

                                <div class="col-md-6 col-sm-12">
                                    <div
                                        class="card 
                                        @if($t->status == 'Abierto')
                                            card-border-c-blue
                                        @elseif($t->status == 'Cancelado')
                                            card-border-c-yellow
                                        @elseif($t->status == 'Finalizado')
                                            card-border-c-green
                                        @else
                                            card-border-c-red
                                        @endif
                                        ">
                                        <div class="card-header">
                                            <a href="javascript: void(0);" class="text-secondary">{{$t->name}} </a>
                                            <span
                                                class="label label-primary float-right"> {{ \Carbon\Carbon::parse($t->created_at)->diffForHumans()  }} </span>
                                        </div>
                                        <div class="card-body card-task">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <p class="task-detail">{{$t->description}}</p>
                                                    <div class="d-flex align-items-center justify-content-between mt-3">
                                                        <div>
                                                            <p class="m-0 font-weight-600"><strong>Prof:</strong><span
                                                                    class="text-dark">&nbsp;&nbsp;{{$course->teacher->profession}}&nbsp;{{$course->teacher->name}}&nbsp;{{$course->teacher->last_name}}</span>
                                                            </p>
                                                            <p class="m-0 font-weight-600"><strong>F.
                                                                    Inicio:</strong><span class="text-primary">&nbsp;&nbsp;{{$t->start_date->format('M d')}}</span>
                                                            </p>
                                                            <p class="m-0 font-weight-600"><strong>F.
                                                                    Entrega:</strong><span class="text-primary">&nbsp;&nbsp;{{$t->end_date->format('M d')}}</span>
                                                            </p>
                                                        </div>
                                                        <div class="text-right">
                                                            <p class="m-0">&nbsp;</p>
                                                            <p class="m-0">&nbsp;</p>
                                                            <p class="m-0 font-weight-600"><strong>Hora:</strong><span
                                                                    class="text-primary">&nbsp;&nbsp;{{$t->end_time->format('H:i a')}}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="task-list-table">
                                                    <a href="javascript: void(0);">
                                                        <img class=" img-radius m-r-5"
                                                             width="40" height="40" src="{{asset($course->url_image)}}"
                                                             alt="1"/></a>
                                                    <a href="javascript: void(0);"> 
                                                        @if($t->status == 'Abierto')
                                                            <span class="badge badge-pill badge-success">{{$t->status}}</span>
                                                        @elseif($t->status == 'Cancelado')
                                                            <span class="badge badge-pill badge-warning">{{$t->status}}</span>
                                                        @elseif($t->status == 'Finalizado')
                                                            <span class="badge badge-pill badge-info">{{$t->status}}</span>
                                                        @else
                                                            <span class="badge badge-pill badge-danger">{{$t->status}}</span>
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="task-board">
                                                    <p hidden>{{$d_st = $st->taskdeliveries()->where('task_id',$t->id)->get()}}</p>
                                                    @if (count($d_st)<=0)
                                                        <a class="btn btn-sm  btn-info" href="{{route('detailtasks')}}{{'?course='.$course->id.'&task='.$t->id}}" ><i
                                                            class="fas fa-cloud-upload-alt"></i>&nbsp;Entregar
                                                        </a>
                                                    @endif
                                                  
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane {{$position == 'new_task'?'show active':''}}" id="new_task">
                <div class="card">
                    <div class="card mb-0 shadow-none">
                        <div class="card-header">
                            <h5 class="mb-2">{{$task->name}}</h5>
                            <p class="text-muted mb-0">Entregar tarea</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row m-3">
                            <div class="col-md-12">
                                <div class="row addTaskDiv">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <small class="text-primary">Notas</small>
                                            <input type="text" id="exampleFormControlInput1" class="form-control"
                                                placeholder=""
                                                wire:model.defer="description_t"/>
                                            @error('title_t')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                
                                </div>
                            
                                <div id="addFileDiv" class="d-none row" wire:ignore>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <small class="text-primary">Archivos:</small>
                                            <div class="dropzone" id="dropzone">
                                                <div class="dz-default dz-message" data-dz-message="">
                                                    <span>Arrastre los archivos aquí para subirlos</span>
                                                </div>
                                            </div>
                                            <form id="storeFileFrm" action="{{route('store.filesTaskStudent')}}"></form>
                                            <form action="{{route('destroy.filesTaskStudent')}}" id="destroyFileFrm"></form>
                                            <form action="{{route('load.filesTaskStudent')}}" id="loadFileFrm"></form>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" id="storeTaskBtn">
                                        <div class="form-group text-right">
                                            <button wire:click.prevent="cancelUpdate()" type="button"
                                                    class="btn btn-sm btn-md btn-danger close-btn float-right ml-3"
                                                    data-dismiss="modal">Cancelar
                                            </button>
                                            <button wire:click.prevent="storeTask()"
                                                    class="btn btn-sm btn-md btn-info float-right ">
                                                Siguiente
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-md-12 d-none" id="updateTaskBtn">
                                        <div class="form-group text-right">
                                            <button wire:click.prevent="cancelUpdate()" type="button"
                                                    class="btn btn-sm btn-md btn-danger close-btn float-right ml-3"
                                                    data-dismiss="modal">Cancelar
                                            </button>
                                            <button wire:click.prevent="updateTask()"
                                                    class="btn btn-sm btn-md btn-info float-right ">
                                                Actualizar
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-12 d-none" id="addFileBtn">
                                        <div class="form-group text-right">
                                            <button wire:click.prevent="finalizeTask()" type="button"
                                                    class="btn btn-sm btn-md btn-danger close-btn float-right ml-3"
                                                    data-dismiss="modal">Finalizar
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        <script>
          
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

            let task_id;
            window.addEventListener('data', event => {
                task_id = event.detail.task_id
               
            });
            let destroyRoute = document.getElementById('destroyFileFrm').getAttribute('action');
            var loadRoute = document.getElementById('loadFileFrm').getAttribute('action');
            let storeRoute = document.getElementById('storeFileFrm').getAttribute('action');
            let csrf = document.getElementsByName('token').values();

            Dropzone.autoDiscover = false;

            $('#dropzone').dropzone({
                url: storeRoute,
                maxFilesize: 2,
                addRemoveLinks: true,
                init: function () {
                    let thisDropzone = this;

                    window.livewire.on('loadData', taskId => {
                        $.ajax({
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            type: 'POST',
                            url: loadRoute,
                            data: {task_id: taskId},
                            success: function (data) {
                                console.log('cargando archivos');
                                $(data).each(function (key, value) {
                                    var mockFile = {
                                        name: value.name,
                                        fullname: value.filename,
                                        size: value.size_file,
                                        fileUrl: '/' + value.url_file,
                                    };
                                    let callback = null; // Optional callback when it's done
                                    let crossOrigin = null; // Added to the `img` tag for crossOrigin handling
                                    let resizeThumbnail = false; // Tells Dropzone whether it should resize the image first
                                    thisDropzone.displayExistingFile(mockFile, mockFile.fileUrl, callback), crossOrigin, resizeThumbnail;
                                    mockFile.previewElement.classList.add('dz-success');
                                    mockFile.previewElement.classList.add('dz-complete');
                                });
                            },
                        });
                    });

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
                        message: 'El archivo es demasiado grande. Tamaño máximo de archivo: 2MB.'
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
                    return time + " - " + file.name;
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


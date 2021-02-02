<div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills bg-nav-pills nav-justified mb-0">
                    <li class="nav-item">
                        <a wire:click="loadDataDetail({{ $course->id }})" href="#detail_c" data-toggle="tab"
                           aria-expanded="{{$position == 'detail_c'?true:false}}"
                           class="nav-link {{$position == 'detail_c'?'active':''}}">
                            <i class="fas fa-file-alt f-18"></i>
                            <span class="d-none d-lg-inline-block m-l-10">Información</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a wire:click="edit({{ $course->id }})" href="#update_c" data-toggle="tab"
                           aria-expanded="{{$position == 'update_c'?true:false}}"
                           class="nav-link {{$position == 'update_c'?'active':''}}">
                            <i class="fas fa-edit f-18"></i>
                            <span class="d-none d-lg-inline-block m-l-10">Actualizar</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a wire:click="loadDataTask({{ $course->id }})" href="#task_c" data-toggle="tab"
                           aria-expanded="{{$position == 'task_c'?true:false}}"
                           class="nav-link {{$position == 'task_c'?'active':''}} ">
                            <i class="fas fa-list-alt f-18"></i>
                            <span class="d-none d-lg-inline-block m-l-10">Tareas</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a wire:click="loadNewTask({{ $course->id }})" href="#new_task" data-toggle="tab"
                           aria-expanded="{{$position == 'new_task'?true:false}}"
                           class="nav-link {{$position == 'new_task'?'active':''}}">
                            <i class="fas fa-file-medical f-18"></i>
                            <span class="d-none d-lg-inline-block m-l-10">{{$task_title}} tarea</span>
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
                                    <div class="col-lg-12">
                                        <form class="pl-lg-4">
                                            <h6 class="text-muted">{{$course->subject->name}}</h6>
                                            <h3 class="mt-0">{{$course->name}} <a href="javascript: void(0);"
                                                                                  class="text-muted"><i
                                                        class="mdi mdi-square-edit-outline ml-2"></i></a></h3>
                                            <p class="mb-1">Publicado {{$course->created_at}}</p>
                                            <div id="carouselExampleCaptions" class="carousel slide carousel-fade"
                                                 data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="{{asset($course->url_image)}}" class="d-block"
                                                             alt="Product images">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="mt-4">
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <div class="media">
                                                            <i class="fas fa-tag text-success mr-2 mt-2"></i>
                                                            <div class="media-body">
                                                                <strong class="">Periodo Académico</strong>
                                                                <span>{{$course->academic_period->name}}</span>

                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mt-2">
                                                        <div class="media">
                                                            <i class="fas fa-tag text-success mr-2 mt-2"></i>
                                                            <div class="media-body">
                                                                <strong class="">Nivel</strong>
                                                                <span>{{$course->level->name}}</span>

                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mt-2">
                                                        <div class="media">
                                                            <i class="fas fa-tag text-success mr-2 mt-2"></i>
                                                            <div class="media-body">
                                                                <strong class="">Asignatura</strong>
                                                                <span>{{$course->subject->name}}</span>

                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mt-2">
                                                        <div class="media">
                                                            <i class="fas fa-tag text-success mr-2 mt-2"></i>
                                                            <div class="media-body">
                                                                <strong class="">Docente a cargo </strong>
                                                                <span>{{$course->teacher->profession}} {{$course->teacher->name}} {{$course->teacher->last_name}}</span>

                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="pl-lg-4 mt-4">
                                            <h6>Descripción:</h6>
                                            <p>{{$course->description}}</p>
                                            <h6>Contenido:</h6>
                                            <p>{{$course->description}}</p>
                                            <div class="w-100">
                                                {!! $course->content !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- customar project  end -->
                </div>
            </div>
            <div class="tab-pane {{$position == 'update_c'?'show active':''}}" id="update_c">
                <div class="card">
                    <div class="card-body">
                        <div class="row m-3">
                            <div class="cl-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="margin-left: 0px;" class="mr-3 text-primary">Título</label>
                                            <input type="text" id="exampleFormControlInput1" class="form-control"
                                                   placeholder="" wire:model.defer="name"/>
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="margin-left: 0px;" class="mr-3 text-primary">Portada
                                                nueva</label>
                                            <div class="input-group ">
                                                <div class="input-group-prepend">
                                                    @if($url_image =='')
                                                        <img wire:ignore src="{{asset('img/user.jpg')}}"
                                                             alt="user image" class="img-radius align-top m-r-15"
                                                             style="width:40px;">
                                                    @else
                                                        <img wire:ignore src="{{asset($url_image)}}" alt="user image"
                                                             class="img-radius align-top m-r-15" style="width:40px;">
                                                    @endif
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                                                           wire:model.defer="url_image">
                                                    <label class="custom-file-label" for="inputGroupFile01">Subir
                                                        imagen</label>
                                                </div>

                                            </div>
                                            @error('url_image')<span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="margin-left: 0px;"
                                                   class="mr-3 text-primary">Descripción</label>
                                            <textarea type="text" id="exampleFormControlInput2" class="form-control"
                                                      rows="5" placeholder="" wire:model.defer="description">
                                    </textarea>
                                            @error('description')<span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label style="margin-left: 0px;" class="mr-3 text-primary">Portada actual
                                            anterior</label>
                                        <div class="form-group">
                                            <div class="carousel-item active">
                                                <img height="130" src="{{asset($course->url_image)}}" class="d-block"
                                                     alt="Product images">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="margin-left: 0px;" class="mr-3 text-primary">Contenido</label>
                                            <div class="form-group" wire:ignore>
                                                <textarea id="content" name="content" wire:model="content"
                                                          class="form-control summernote"></textarea>
                                            </div>
                                            @error('content')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="margin-left: 0px;" class="mr-3 text-primary">Estado</label>
                                            <div class="switch switch-info d-inline m-r-10">
                                                <input wire:model.defer="status" type="checkbox" id="switch-i-1"
                                                       checked>
                                                <label for="switch-i-1" class="cr"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-right">
                                            @can('update_course')
                                                <button wire:click.prevent="update()" class="btn btn-md btn-info">
                                                    Actualizar
                                                </button>
                                            @endcan
                                            <button wire:click.prevent="loadDataDetail({{ $course->id }})" type="button"
                                                    class="btn btn-md btn-danger close-btn bl-3" data-dismiss="modal">
                                                Cancelar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                        <a class="dropdown-item" href="javascript: void(0);">Ver todos</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript: void(0);">Hoy</a>
                                        <a class="dropdown-item" href="javascript: void(0);">Ayer</a>
                                        <a class="dropdown-item" href="javascript: void(0);">Esta semana</a>
                                        <a class="dropdown-item" href="javascript: void(0);">Este mes</a>
                                        <a class="dropdown-item" href="javascript: void(0);">Este año</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-secondary" href="javascript: void(0);"
                                       id="bystatus" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false"><i class="fas fa-chart-line"></i>Estados</a>
                                    <div class="dropdown-menu" aria-labelledby="bystatus">
                                        <a class="dropdown-item" href="javascript: void(0);">Ver todos</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript: void(0);">Abierto</a>
                                        <a class="dropdown-item" href="javascript: void(0);">Cancelado</a>
                                        <a class="dropdown-item" href="javascript: void(0);">Finalizado</a>
                                    </div>
                                </li>

                            </ul>
                        </nav>

                        <div class="row">
                            <div hidden>  {{\Carbon\Carbon::setLocale('es')}} </div>
                            @foreach($course->tasks as $task)

                                @php($endtimes = \Carbon\Carbon::parse($task->end_time))
                                @php($enddates = \Carbon\Carbon::parse($task->end_date))
                                @php($final_date =  \Carbon\Carbon::parse($enddates->format('Y-m-d')." ".$endtimes->format('H:i:s')))

                                <div class="col-md-6 col-sm-12">
                                    <div
                                        class="card {{$final_date->isPast()?'card-border-c-red':'card-border-c-blue'}}">
                                        <div class="card-header">
                                            <a href="javascript: void(0);" class="text-secondary">{{$task->name}} </a>
                                            <span
                                                class="label label-primary float-right"> {{ \Carbon\Carbon::parse($task->created_at)->diffForHumans()  }} </span>
                                        </div>
                                        <div class="card-body card-task">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <p class="task-detail">{{$task->description}}</p>
                                                    <div class="d-flex align-items-center justify-content-between mt-3">
                                                        <div>
                                                            <p class="m-0 font-weight-600"><strong>Prof:</strong><span
                                                                    class="text-dark">&nbsp;&nbsp;{{$course->teacher->profession}}&nbsp;{{$course->teacher->name}}&nbsp;{{$course->teacher->last_name}}</span>
                                                            </p>
                                                            <p class="m-0 font-weight-600"><strong>F.
                                                                    Inicio:</strong><span class="text-primary">&nbsp;&nbsp;{{$task->start_date->format('M d')}}</span>
                                                            </p>
                                                            <p class="m-0 font-weight-600"><strong>F.
                                                                    Entrega:</strong><span class="text-primary">&nbsp;&nbsp;{{$task->end_date->format('M d')}}</span>
                                                            </p>
                                                        </div>
                                                        <div class="text-right">
                                                            <p class="m-0">&nbsp;</p>
                                                            <p class="m-0">&nbsp;</p>
                                                            <p class="m-0 font-weight-600"><strong>Hora:</strong><span
                                                                    class="text-primary">&nbsp;&nbsp;{{$task->end_time->format('H:i a')}}</span>
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
                                                    <a href="javascript: void(0);"><i class="fas fa-plus"></i></a>
                                                </div>
                                                <div class="task-board">
                                                    <button class="btn btn-sm  btn-info"
                                                            wire:click="editTask({{$task->id}})"><i
                                                            class="fa fa-pencil-alt"></i>&nbsp;Editar
                                                    </button>
                                                    <div class="dropdown-secondary dropdown">
                                                        <button
                                                            class="btn waves-effect waves-light btn-primary btn-sm dropdown-toggle"
                                                            type="button" id="dropdown1" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">Estado
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdown1"
                                                             data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                            <a class="dropdown-item {{$task->status == 'Abierto' ? 'active' : ''}}" href="javascript: void(0);" wire:click="updateTaskStatus({{$task->id}},'Abierto')">
                                                                <span class="point-marker bg-danger"></span>Abierto</a>
                                                            <a class="dropdown-item {{$task->status == 'Cancelado' ? 'active' : ''}}" href="javascript: void(0);"wire:click="updateTaskStatus({{$task->id}},'Cancelado')"><span
                                                                    class="point-marker bg-warning"></span>Cancelado</a>
                                                            <a class="dropdown-item {{$task->status == 'Finalizado' ? 'active' : ''}}"
                                                               href="javascript: void(0);" wire:click="updateTaskStatus({{$task->id}},'Finalizado')"><span
                                                                    class="point-marker bg-success"></span>Finalizado</a>
                                                        </div>
                                                    </div>
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
                            <h5 class="mb-2">{{$course->name}}</h5>
                            <p class="text-muted mb-0">Añadir nueva tarea</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row m-3">
                            <div class="col-md-12">
                                <div class="row addTaskDiv">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <small class="text-primary">Título</small>
                                            <input type="text" id="exampleFormControlInput1" class="form-control"
                                                   placeholder=""
                                                   wire:model.defer="title_t"/>
                                            @error('title_t')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <small class="text-primary">Descripcion</small>
                                            <textarea type="text" id="exampleFormControlInput2" class="form-control"
                                                      rows="5"
                                                      placeholder="" wire:model.defer="description_t"></textarea>
                                            @error('description_t')<span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row addTaskDiv">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <small class="text-primary">Inicia</small>
                                            <input type="date" id="exampleFormControlInput2" class="form-control"
                                                   placeholder=""
                                                   wire:model.defer="start_date_t"/>
                                            @error('start_date_t')<span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <small class="text-primary">Finaliza</small>
                                            <input type="date" id="exampleFormControlInput2" class="form-control"
                                                   placeholder=""
                                                   wire:model.defer="end_date_t"/>
                                            @error('end_date_t')<span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <small class="text-primary">Hora límite</small>
                                            <input type="time" id="exampleFormControlInput2" class="form-control"
                                                   placeholder=""
                                                   wire:model.defer="hour_t"/>
                                            @error('hour_t')<span class="text-danger">{{ $message }}</span>
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
                                            <form id="storeFileFrm" action="{{route('store.filesTask')}}"></form>
                                            <form action="{{route('destroy.filesTask')}}" id="destroyFileFrm"></form>
                                            <form action="{{route('load.filesTask')}}" id="loadFileFrm"></form>
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
                                                Guardar
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
            window.livewire.on('loadData', () => {

                $('.summernote').summernote({
                    dialogsInBody: true,
                    tabsize: 2,
                    height: 200,
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

                // console.log("============>>>>"+@this.get('content'))
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

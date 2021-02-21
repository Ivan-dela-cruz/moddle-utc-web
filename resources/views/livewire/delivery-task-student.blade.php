<div>
    <div class="row">
        <div class="col-xl-7 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-3"><i class="fas fa-ticket-alt m-r-5"></i>{{$task->name}}</h5>
                    <a href="{{route('detailcourses')}}{{'?course='.$course->id}}" class="btn waves-effect waves-light btn-primary float-right has-ripple text-white">
                        <i class="far fa-arrow-alt-circle-left m-r-5"></i>Atras
                        <span class="ripple ripple-animate"></span>
                    </a>
                  
                </div>
                <div class="card-body">
                    <div class="m-b-20">
                        <h6>Descripción</h6>
                        <hr>
                        <p>{{$task->description}}</p>
                    </div>
                   
                   
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5>Archivos adjuntos</h5>
                </div>
                <div class="card-body task-attachment">

                    <ul class="media-list p-0">
                        @foreach($task->files as $file)
                            <li class="media d-flex m-b-15">
                                <div class="m-r-20 file-attach">
                                    <i class="{{$this->getIcon($file->name)}}"></i>
                                </div>
                                <div class="media-body">
                                    <a href="#!" class="m-b-5 d-block text-secondary">{{$file->name}}</a>
                                    <div class="text-muted">
                                        <small>Tamaño: {{$this->formatSizeUnits($file->size_file)}} </small>
                                       
                                    </div>
                                </div>
                                <div class="float-right text-muted">
                                    
                                    <a href="{{route('download-delivery',$file->id)}}"><i class="fas fa-download f-18"></i></a>
                                </div>
                            </li>
                        @endforeach
                       
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-text"><i class="fas fa-plus m-r-5"></i> Lista de entregas</h5>
                    
                </div>
                <div class="card-body task-comment">
                    <div class="m-b-20">
    
                        <div class="table-responsive m-t-20">
                            <table class="table m-b-0 f-14 b-solid requid-table">
                                <thead>
                                    <tr class="text-uppercase">
                                        <th>#</th>
                                        <th>Estudiante</th>
                                        <th>Entregado</th>
                                      
                                    </tr>
                                </thead>
                                <tbody class="text-muted">
                                    <p hidden>{{$cont = 1}}</p>
                                    <p hidden> {{\Carbon\Carbon::setLocale('es')}}</p>
                                    @foreach($task->taskdeliveries as $delivery)
                                        <tr>
                                            <td>{{$cont}}</td>
                                            <td><a wire:click.prevent="selectDelivery({{$delivery->id}})" href="javascript:void(0);">{{$delivery->student->name}} {{$delivery->student->last_name}}</a></td>
                                            <td class=""> <i class="far fa-calendar-alt"></i>&nbsp; {{$delivery->created_at->isoFormat('dddd, MMMM D, YYYY h:mm a')}}</td>
                                           
                                        </tr>
                                    @endforeach
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
        <div class="col-xl-5 col-lg-12 task-detail-right">
            <div class="card">
                <div class="card-header">
                    <h5>Detalles generales</h5>
                </div>
                <div class="card-body task-details">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><i class="text-c-red fas fa-user-graduate m-r-5"></i> Periodo:</td>
                                <td class="text-right"><span class="float-right"><a class="text-secondary" href="javascritp:void(0);">{{$course->academic_period->name}} </a></span></td>
                            </tr>
                            
                            <tr>
                                <td><i class="text-c-purple far fa-credit-card m-r-5"></i> Nivel:</td>
                                <td class="text-right">{{$course->level->name}}</td>
                            </tr>
                            <tr>
                                <td><i class="text-c-yellow fas fa-user-tie m-r-5"></i> Docente:</td>
                                <td class="text-right">{{$course->teacher->name}} {{$course->teacher->last_name}}</td>
                            </tr>
                            <tr>
                                <td><i class="text-c-green fas fa-book m-r-5"></i> Materia:</td>
                                <td class="text-right">
                                    {{$course->subject->name}}
                                </td>
                            </tr>
                            <tr>
                                <td><i class="text-muted fas fa-calendar-alt m-r-5"></i> Creado:</td>
                                <td class="text-right">{{\Carbon\Carbon::parse($task->created_at)->diffForHumans()}}</td>
                            </tr>
                            <tr>
                                <td><i class="text-success fas fa-calendar-check m-r-5"></i> Entrega:</td>
                                <td class="text-right">{{$task->end_date->format('Y-m-d')}}</td>
                            </tr>
                            <tr>
                                <td><i class="text-warning fas fa-clock m-r-5"></i> Tiempo Limite:</td>
                                <td class="text-right">{{$task->end_time->format('H:i a')}}</td>
                            </tr>
                            <tr>
                                <td><i class="text-info fas fa-info-circle m-r-5"></i> Estado:</td>
                                <td class="text-right"><span class=" badge
                                    {{$task->status == 'Abierto'?'badge-success':''}}
                                    {{$task->status == 'Cancelado'?'badge-warning':''}}
                                    {{$task->status == 'Atrasado'?'badge-danger':''}}
                                    {{$task->status == 'Finalizado'?'badge-info':''}}
                                    ">{{$task->status}}</span></td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
            @if (!is_null($delivery_select)) 
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-header-text"><i class=" text-muted fas fa-file-archive m-r-5"></i> Detalle de entrega</h5>  
                    </div>
                    <div class="card-body task-comment">
                        <div class="m-b-20">
                         
                            <h6>Observación en la entrega</h6>
                            <p>{{$delivery_select->description}}</p>
                            <hr>
                           
                            <h6>Archivos adjuntos</h6>
                          
                            <ul class="media-list p-0">                             
                                @foreach($delivery_select->files as $file_d)
                                    <li class="media d-flex m-b-15">
                                        <div class="m-r-20 file-attach">
                                            <i class="{{$this->getIcon($file_d->name)}}"></i>
                                        </div>
                                        <div class="media-body">
                                            <a href="#!" class="m-b-5 d-block text-secondary">{{$file_d->name}}</a>
                                            <div class="text-muted">
                                                <small>Tamaño: {{$this->formatSizeUnits($file_d->size_file)}} </small>
                                            
                                            </div>
                                        </div>
                                        <div class="float-right text-muted">
                                            <a href="{{route('download-delivery',$file_d->id)}}"><i class="fas fa-download f-18"></i></a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <h6>Nota</h6>
                            <div class="form-inline w-auto">
                                <input class="form-control" placeholder="Ingrese nota"  type="number" wire:model="note_new">

                                <button type="button" class="btn btn-primary btn-md" wire:click="saveNote({{$delivery_select->id}})"> Guardar</button>
                            </div>
                            @error('note_new')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

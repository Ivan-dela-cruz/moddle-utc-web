<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-xl-3 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-0 d-flex justify-content-between">
                            <div class="form-group mr-4" wire:ignore >
                                <label class="floating-label" for="filterserch"><i class="feather icon-search"></i> Buscar</label>
                                <input type="text" wire:model="search" class="form-control" id="filterserch">
                            </div>
                            <div class="form-group">
                                @if($search !='')
                                    <button wire:click="clear" class="btn btn-outline-danger ">X</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div id="filters-side" class="button-group">
                        <button wire:ignore wire:click = "allTasks()" class="button btn btn-block text-left border-0 m-0 rounded-0 btn-outline-secondary active" data-filter="*">TODO</button>
                        @foreach($courses as $course)
                            <button class="button btn btn-block text-left border-0 m-0 rounded-0 btn-outline-secondary" data-filter=".{{$course->id}}" wire:ignore wire:click=" taskByCourse({{$course->id}})">
                                {{$course->name}}</button>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row pl-2 pr-2">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select wire:model="period_id" class="form-control" name="period_id" id="" aria-label="" aria-describedby="basic-addon1" >
                                        <option  value="">Periodo académico</option>
                                        @foreach($periods as $period)
                                            <option value="{{$period->id}}">{{$period->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <select wire:model = "level_id" class="form-control" name="level_id" id="" aria-label="" aria-describedby="basic-addon1" >
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
                                        <option value="E">E</option>
                                        <option value="F">F</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select  wire:model="subject_id" class="form-control" name="subject_id" id="" aria-label="" aria-describedby="basic-addon1" >
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

                <div class="row">
                    <div hidden>  {{\Carbon\Carbon::setLocale('es')}} </div>
                    @if($tasks->count()>0)
                    @foreach($tasks as $task)

                        @php($endtimes = \Carbon\Carbon::parse($task->end_time))
                        @php($enddates = \Carbon\Carbon::parse($task->end_date))
                        @php($final_date =  \Carbon\Carbon::parse($enddates->format('Y-m-d')." ".$endtimes->format('H:i:s')))

                        <div class="col-md-6 col-sm-12">
                            <div class="card {{$final_date->isPast()?'card-border-c-red':'card-border-c-blue'}}">
                                <div class="card-header">
                                    <a href="javascript: void(0);" class="text-secondary">{{$task->name}} </a>
                                    <span class="label label-primary float-right"> {{ \Carbon\Carbon::parse($task->created_at)->diffForHumans()  }} </span>
                                </div>
                                <div class="card-body card-task">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p class="task-detail">{{$task->description}}</p>

                                            <div class="d-flex align-items-center justify-content-between mt-3">
                                                <div>
                                                    @foreach($courses as $course)
                                                        @if($task->course_id == $course->id)
                                                            <p class="m-0 font-weight-600"><strong>Prof:</strong><span class="text-dark">&nbsp;&nbsp;{{$course->teacher->profession}}&nbsp;{{$course->teacher->name}}&nbsp;{{$course->teacher->last_name}}</span></p>
                                                        @endif
                                                    @endforeach
                                                    <p class="m-0 font-weight-600"><strong>F. Inicio:</strong><span class="text-primary">&nbsp;&nbsp;{{$task->start_date->format('M d')}}</span></p>
                                                    <p class="m-0 font-weight-600"><strong>F. Entrega:</strong><span class="text-primary">&nbsp;&nbsp;{{$task->end_date->format('M d')}}</span></p>
                                                </div>
                                                <div class="text-right">
                                                    <p class="m-0">&nbsp;</p>
                                                    <p class="m-0">&nbsp;</p>
                                                    <p class="m-0 font-weight-600"><strong>Hora:</strong><span class="text-primary">&nbsp;&nbsp;{{$task->end_time->format('H:i a')}}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="d-flex align-items-center justify-content-between">
                                    <div class="task-list-table">
                                        @foreach($courses as $course)
                                            @if($task->course_id == $course->id)
                                                <a href="javascript: void(0);"><img class=" img-radius m-r-5" src="{{asset($course->url_image)}}" alt="1" height="40" width="40" /></a>
                                            @endif
                                        @endforeach
                                      
                                    </div>
                                    <div class="task-board">
                                        <div class="dropdown-secondary dropdown">
                                            <a href="{{route('detailtasks')}}{{'?course='.$course->id.'&task='.$task->id}}"><i class="text-muted fas fa-eye mr-2"></i>Ver detalle</a>
                                        </div>

                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @else
                        <div class="col-md-12">
                            <center>
                                <h5 class="text-muted">Sin resultados</h5>
                            </center>
                        </div>
                    @endif
                </div>

            </div>
        </div>
        @if($tasks->count()>0)
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group float-right">
                    {{$tasks->links()}}
                </div>
            </div>
        </div>
            @endif
    </div>
</div>

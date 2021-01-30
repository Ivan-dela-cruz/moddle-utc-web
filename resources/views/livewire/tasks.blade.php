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
                <div class="grid row">
                    <div hidden>  {{\Carbon\Carbon::setLocale('es')}} </div>
                    @if($tasks->count()>0)
                        @foreach($tasks as $task)
                            <div class="col-lg-4 col-md-6 element-item realestate {{$task->course_id}}" data-category="realestate">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media align-items-center p-0">
                                            <div class="text-center">
                                                @foreach($courses as $course)
                                                    @if($task->course_id == $course->id)
                                                        <img src="{{asset($course->url_image)}}" alt="{{$course->name}}" class="mr-3 img-radius" height="40" width="40">
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div>
                                                <h4 class="m-0 text-bold">{{$task->name}}</h4>
                                                @foreach($courses as $course)
                                                    @if($task->course_id == $course->id)
                                                        <span>{{$course->teacher->name}}&nbsp;{{$course->teacher->last_name}}</span>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-3">
                                            <div>
                                                <p class="m-0 font-weight-600">F. Inicio:<span class="text-primary">&nbsp;&nbsp;{{$task->start_date->format('M d')}}</span></p>
                                                <p class="m-0 font-weight-600">F. Entrega:<span class="text-primary">&nbsp;&nbsp;{{$task->end_date->format('M d')}}</span></p>
                                            </div>
                                            <div class="text-right">
                                                <p class="m-0">&nbsp;</p>
                                                <p class="m-0 font-weight-600"><span class="text-primary">{{$task->end_time->format('H:i a')}}</span></p>

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
        @if($tasks->count()>=$perPage)
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

<div>
    <div class="row">

        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row pr-4 pl-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <select wire:model="period_id" class="form-control" name="period_id" id="" aria-label=""
                                        aria-describedby="basic-addon1">
                                    <option value="">Periodo académico</option>
                                    @foreach($periods as $period)
                                        <option value="{{$period->id}}">{{$period->name}}</option>
                                    @endforeach
                                </select>
                                @error('period_id')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select wire:model="level_id" class="form-control" name="level_id" id="" aria-label=""
                                        aria-describedby="basic-addon1">
                                    <option value="">Nivel</option>
                                    @foreach($levels as $level)
                                        <option value="{{$level->id}}">{{$level->name}}</option>
                                    @endforeach
                                </select>
                                @error('level_id')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control" wire:model="parallel" name="parallel">
                                    <option value="">Paralelo</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                                @error('parallel')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select wire:model="subject_id" class="form-control" name="subject_id" id=""
                                        aria-label="" aria-describedby="basic-addon1">
                                    <option value="">Materia</option>
                                    @foreach($subjects as $subject)
                                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                                    @endforeach
                                </select>
                                @error('subject_id')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <h5 class="pl-3 pt-3 pb-1"><strong>Formulario de registro alumnos</strong></h5>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button wire:click.prevent="findMember()" class="btn btn-sm  btn-info"
                                            type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                                <input wire:model="input_search" wire:keydown.enter="findMember()" type="text"
                                       class="form-control" placeholder="Ingrese número de identificación">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h6><strong>1.- Datos personales del alumno: </strong></h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-3">
                                    Nombres <small class="text-danger">*</small>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input readonly type="text" class="form-control" id="name" placeholder=""
                                               wire:model="name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-3">
                                    Apellidos <small class="text-danger">*</small>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input readonly type="text" class="form-control" id="last_name" placeholder=""
                                               wire:model="last_name">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-3">
                                    DNI <small class="text-danger">*</small>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input readonly type="text" class="form-control" id="dni" placeholder=""
                                               wire:model="dni">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-3">
                                    Email <small class="text-danger">*</small>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input readonly type="email" class="form-control" id="email" placeholder=""
                                               wire:model="email">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Estado </label>
                                <div class="switch switch-info d-inline m-l-10">
                                    <input wire:model="status" type="checkbox" id="switch-i-1" checked>
                                    <label for="switch-i-1" class="cr"></label>
                                </div>
                            </div>
                        </div>
                    </div>



                    @if($action=='POST')
                        <button wire:click.prevent="store()" class="btn btn-sm btn-primary"> Guadar</button>
                    @else
                        <button wire:click.prevent="update()" class="btn btn-sm btn-success"> Actualizar</button>
                    @endif

                    <button wire:click.prevent="resetInputFields()" class="btn btn-sm btn-danger"> Cancelar</button>

                </div>
            </div>
        </div>

    </div>
</div>


<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
        <!-- div class="row">
                <div class="col-7">
                    <div class="form-group">
                        <input
                            wire:model="search"
                            class="form-control my-border"
                            type="text"
                            placeholder="Buscar...">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <select wire:model="perPage" class="form-control text-gray-500 text-sm my-border">
                            <option value="5">5 por página</option>
                            <option value="10">10 por página</option>
                            <option value="15">15 por página</option>
                            <option value="20">20 por página</option>
                            <option value="50">50 por página</option>
                            <option value="100">100 por página</option>
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        @if($search !='')
            <button wire:click="clear" class="btn btn-outline-danger ml-6">X</button>
@endif
        @can('create_user')
            <button class="btn btn-success btn-sm btn-round has-ripple float-lg-right"
                    data-toggle="modal" data-target="#createModal">
                <i class="feather icon-plus"></i>
                Agregar
            </button>
@endcan
            </div>
        </div>
    </div -->
            <div class="row">
                <div class="col-md-4">
                    <select wire:model="period_id" class="form-control" name="period_id" id="" aria-label=""
                            aria-describedby="basic-addon1">
                        <option value="">Periodo académico</option>
                        @foreach($periods as $period)
                            <option value="{{$period->id}}">{{$period->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <select wire:model="level_id" class="form-control" name="level_id" id="" aria-label=""
                            aria-describedby="basic-addon1">
                        <option value="">Nivel</option>
                        <option value="6">SEXTO</option>
                        <option value="7">SEPTIMO</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select wire:model="parallel" class="form-control" name="parallel">
                        <option value="">Paralelo</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <select wire:model="subject_id" class="form-control" name="subject_id" id="" aria-label=""
                            aria-describedby="basic-addon1">
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

<div>
    <div class="row">
  
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row pr-4 pl-4" >
                        <select wire:model="period_id" class="form-control col-md-4" name="period_id" id="" aria-label="" aria-describedby="basic-addon1" >
                            <option  value="">Periodo académico</option>
                            @foreach($periods as $period)
                                <option value="{{$period->id}}">{{$period->name}}</option>
                            @endforeach
                        </select>
                        <select wire:model = "level_id" class="form-control col-md-4" name="level_id" id="" aria-label="" aria-describedby="basic-addon1" >
                            <option value="">Nivel</option>
                            @foreach($levels as $level)
                                <option value="{{$level->id}}">{{$level->name}}</option>
                            @endforeach
                        </select>
                        <select  wire:model="subject_id" class="form-control col-md-4" name="subject_id" id="" aria-label="" aria-describedby="basic-addon1" >
                            <option value="">Materia</option>
                            @foreach($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                </div>
                <div class="card-body">
                  
                        <div class="row">
                           
                            <div class="col-md-12 table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align: middle; border-right: none;" colspan="2"> Formulario de registro alumnos</th>
                                            <th style="vertical-align: middle; border-left: none;" colspan="2"> 
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button wire:click.prevent="findMember()" class="btn btn-sm  btn-info" type="button">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </div>
                                                    <input wire:model="input_search" wire:keydown.enter="findMember()" type="text" class="form-control" placeholder="Ingrese número de identificación">
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <tr>
                                            <th colspan="4"> <b>1.- Datos personales del alumno: </b></th>
                                        </tr>
                                        <tr>
                                            <td>Nombres <small class="text-danger">*</small></td>
                                            <td> <input readonly type="text" class="form-control" id="name" placeholder="" wire:model="name"></td>
                                            <td>Apellidos <small class="text-danger">*</small></td>
                                            <td> <input readonly type="text" class="form-control" id="last_name" placeholder="" wire:model="last_name"></td>
                                        </tr>
                                       
                                        <tr>
                                            <td>DNI <small class="text-danger">*</small></td>
                                            <td> <input readonly type="text" class="form-control" id="dni" placeholder="" wire:model="dni"></td>
                                            <td>Email <small class="text-danger">*</small></td>
                                            <td> <input readonly type="email" class="form-control" id="email" placeholder="" wire:model="email"></td>
                                        </tr>
                                        
                                        
                                        <tr>
                            
                                            <td colspan="2">
                                                <div class="form-group">
                                                    <label>Estado </label>
                                                    <div class="switch switch-info d-inline m-r-10">
                                                        <input  wire:model="status"  type="checkbox" id="switch-i-1" checked>
                                                        <label for="switch-i-1" class="cr"></label>
                                                    </div>
                                                   
                                                </div>
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                   
                                </table>
                            </div>
                            <div class="col-md-12">
                                <ul>
                                    @error('period_id')  <li><span class="text-danger">{{ $message }}</span></li>
                                    @enderror
                                    @error('student_id')<li><span class="text-danger">{{ $message }}</span></li>
                                    @enderror
                                    @error('level_id') <li><span class="text-danger">{{ $message }}</span></li>
                                    @enderror
                                    @error('subject_id') <li><span class="text-danger">{{ $message }}</span></li>
                                    @enderror
                                    @error('data_id') <li><span class="text-danger">{{ $message }}</span></li>
                                    @enderror
                                </ul>
                                
                            </div>
                        </div>
                
                       @if($action=='POST')
                        <button wire:click.prevent="store()" class="btn btn-primary"> Guadar </button>
                       @else
                       <button wire:click.prevent="update()" class="btn btn-success"> Actualizar </button>
                       @endif
                       
                        <button wire:click.prevent="resetInputFields()" class="btn btn-danger"> Cancelar </button>
                   
                </div>
            </div>
        </div>
       
    </div>
</div>


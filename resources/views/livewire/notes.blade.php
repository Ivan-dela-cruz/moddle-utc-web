<div>
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
                        <button type="button" wire:click = "StudentsBySubjects()">Buscar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card user-profile-list">
        <div class="card-body">
            <div class="dt-responsive table-responsive">
                <table id="user-list-table" class="table nowrap dataTable">
                    <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>DNI</th>
                        <th>Email</th>
                        <th>Usuario</th>
                        <th>Registrado</th>
                        <th>Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($students)>0)
                    @foreach($students as $student_f)
                    <tr>
                        
                      
                        <td>{{$student_f}}</td>
                      
                        
                    </tr>
                @endforeach
                    @endif
                   

                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>

<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
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

    <div class="card user-profile-list">
        <div class="card-body">
            <div class="dt-responsive table-responsive">
                <table id="user-list-table" class="table nowrap dataTable">
                    <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>DNI</th>
                        <th>Email</th>
                        <th>Registrado</th>
                        <th>Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>
                                <div class="d-inline-block align-middle">

                                    <img src="{{asset($student->url_image)}}" alt="user image" class="img-radius align-top m-r-15" style="width:40px; height: 40px">


                                    <div class="d-inline-block">
                                        <h6 class="m-b-0">{{$student->name}} {{$student->last_name}}</h6>
                                        <p class="m-b-0">{{$student->email}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>{{$student->dni}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->created_at}}</td>
                            <td>
                                @if ($student->status === 1)
                                    <span
                                        class="badge badge-light-success">
                           Activo
                        </span>
                                @else
                                    <span
                                        class="badge badge-light-danger">
                                Inactivo
                            </span>
                                @endif
                                <div class="overlay-edit">
                                    @can('update_student')
                                        <button
                                            class="btn btn-icon btn-warning"
                                            wire:click="edit({{ $student->id }})"
                                            type="button"
                                            data-toggle="modal" data-target="#updateModal">
                                            <i class="feather icon-edit-2"></i></button>
                                    @endcan
                                    @can('destroy_student')
                                        <button
                                            wire:click="delete({{ $student->id }})"
                                            data-toggle="tooltip"
                                            title="Titulo"
                                            type="button"
                                            class="btn btn-icon btn-danger">
                                            <i class="feather icon-trash-2"></i>
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

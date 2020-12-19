<div class="form-group">
    <label for="exampleFormControlInput1">Nombre:</label>
    <input type="text" id="exampleFormControlInput1" class="form-control"  placeholder="" wire:model="name" />
    @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Descripcion</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="description" />
    @error('description')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
 <div class="form-group">
    <label for="exampleFormControlInput2">Carrera</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="career" />
    @error('career')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Image</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="url_image" />
    @error('url_image')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Content</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="content" />
    @error('content')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput3">Profesor</label>
    <select class="form-control" id="exampleFormControlInput3" wire:model="teacher_id">
        <option value="">Seleccione</option>
                            @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{$teacher->name}}</option>
                            @endforeach
    </select>

</div>

<div class="form-group">
    <label for="exampleFormControlInput3">Materia</label>
    <select class="form-control" id="exampleFormControlInput3" wire:model="subject_id">
        <option value="">Seleccione</option>
        @foreach ($subjects as $subject)
        <option value="{{ $subject->id }}">{{$subject->name}}</option>
        @endforeach
    </select>

</div>
<div class="form-group">
    <label for="exampleFormControlInput3">Periodo</label>
    <select class="form-control" id="exampleFormControlInput3" wire:model="academic_period_id">
        <option value="">Seleccione</option>
        @foreach ($periods as $period)
        <option value="{{ $period->id }}">{{$period->name}}</option>
        @endforeach
    </select>

</div>
<div class="form-group">
    <label for="exampleFormControlInput3">Ciclo</label>
    <select class="form-control" id="exampleFormControlInput3" wire:model="level_id">
        <option value="">Seleccione</option>
        @foreach ($levels as $level)
        <option value="{{ $level->id }}">{{$level->name}}</option>
        @endforeach
    </select>

</div>
<div class="form-group">
    <label for="exampleFormControlInput3">Estado</label>
    <select class="form-control" id="exampleFormControlInput3" wire:model="status">
        <option value="">Slecciona</option>
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
    </select>
    @error('status')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div wire:ignore class="q-view">
    <div class="overlay"></div>
    <div class="content">
        <div class="card-body">
            <h4>Añadir tarea <span class="badge badge-success text-uppercase ml-2 f-12">nuevo</span></h4>
            <div class="border-bottom pb-3 pt-3">
                <div class="row">
                    <div class="col-md-7">
                        <p class="list-inline-item mb-0">
                            <img src="{{asset('assets2/images/ticket/p1.jpg')}}" alt=""
                                 class="wid-20 rounded mr-1 img-fluid">
                            Materia
                        </p>
                    </div>
                    <div class="col-md-5 text-right">
                        <p class="d-inline-block mb-0"><i class="feather icon-calendar mr-1"></i><label
                                class="mb-0">Jan,1st,2019</label></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ tinymce editor ] start -->
        <div class="col-sm-12">
            <div class="card border-0 shadow-none">
                <div class="card-body pr-0 pl-0 pt-0">
                  <div class="row m-3">
                      <div class="col-md-12">
                          <div class="row addTaskDiv">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <small class="text-primary">Título</small>
                                      <input type="text" id="exampleFormControlInput1" class="form-control" placeholder=""
                                             wire:model="title_t"/>
                                      @error('title_t')
                                      <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <small class="text-primary">Descripcion</small>
                                      <textarea type="text" id="exampleFormControlInput2" class="form-control" rows="5"
                                                placeholder="" wire:model="description_t"></textarea>
                                      @error('description_t')<span class="text-danger">{{ $message }}</span>
                                      @enderror
                                  </div>
                              </div>
                          </div>
                          <div class="row addTaskDiv">
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <small class="text-primary">Inicia</small>
                                      <input type="date" id="exampleFormControlInput2" class="form-control" placeholder=""
                                             wire:model="start_date_t"/>
                                      @error('start_date_t')<span class="text-danger">{{ $message }}</span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <small class="text-primary">Finaliza</small>
                                      <input type="date" id="exampleFormControlInput2" class="form-control" placeholder=""
                                             wire:model="end_date_t"/>
                                      @error('end_date_t')<span class="text-danger">{{ $message }}</span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <small class="text-primary">Hora límite</small>
                                      <input type="time" id="exampleFormControlInput2" class="form-control" placeholder=""
                                             wire:model="hour_t"/>
                                      @error('hour_t')<span class="text-danger">{{ $message }}</span>
                                      @enderror
                                  </div>
                              </div>
                          </div>
                          <div id="addFileDiv" class="d-none row">
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
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12" id="storeTaskBtn">
                                  <div class="form-group text-right">
                                      <button wire:click.prevent="cancelStoreTask()" type="button"
                                              class="btn btn-sm btn-md btn-danger close-btn float-right ml-3"
                                              data-dismiss="modal">Cancelar
                                      </button>
                                      <button wire:click.prevent="storeTask()" class="btn btn-sm btn-md btn-info float-right ">
                                          Guardar
                                      </button>
                                  </div>
                              </div>

                              <div class="col-md-12 d-none" id="addFileBtn" >
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


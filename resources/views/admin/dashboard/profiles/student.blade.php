<!-- profile header start -->
<div class="user-profile user-card mb-4">
    <div class="card-header border-0 p-0 pb-0">
        <div class="cover-img-block">
            <!-- <img src="assets/images/profile/cover.jpg" alt="" class="img-fluid"> -->
            <div class="overlay"></div>
            <div class="change-cover">
                <div class="dropdown">
                    <a class="drp-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon feather icon-camera"></i></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#"><i class="feather icon-upload-cloud mr-2"></i>upload new</a>
                        <a class="dropdown-item" href="#"><i class="feather icon-image mr-2"></i>from photos</a>
                        <a class="dropdown-item" href="#"><i class="feather icon-film mr-2"></i> upload video</a>
                        <a class="dropdown-item" href="#"><i class="feather icon-trash-2 mr-2"></i>remove</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body py-0">
        <div class="user-about-block m-0">
            <div class="row">
                <div class="col-md-4 text-center mt-n5">
                    <div class="change-profile text-center">
                        <div class="dropdown w-auto d-inline-block">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="profile-dp">
                                    <div class="position-relative d-inline-block">
                                        <div wire:ignore  id="loading" class=" text-primary"  role="status">
                                            <span class="sr-only">Loading...</span>
                                            <img id="preview" wire:ignore class="img-radius img-fluid wid-100 " src="{{asset($user->url_image)}}" alt="User image" >
                                        </div>
                                    </div>
                                    <div class="overlay">
                                        <span>Foto</span>
                                    </div>
                                </div>
                                <div class="certificated-badge">
                                    <i class="fas fa-certificate text-c-blue bg-icon"></i>
                                    <i class="fas fa-check front-icon text-white"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu">
                                <input type="file" id="photo_profile" class="d-none" wire:model="url_image" accept="image/x-png,image/jpg,image/jpeg">
                                <input wire:click="updatePhoto({{$user->student->id}})" type="button" id="updatePhotoBtn" class="d-none"/>
                                <input wire:click="removePhoto({{$user->student->id}})" type="button" id="removePhotoBtn" class="d-none"/>
                                <a class="dropdown-item" href="javascript:changeProfile()"><i class="feather icon-upload-cloud mr-2"></i>Subir</a>
                                <a class="dropdown-item" href="javascript:removeImage()"><i class="feather icon-trash-2 mr-2"></i>Eliminar</a>
                            </div>
                        </div>
                    </div>
                    <h5 class="mb-1">{{$user->name}}&nbsp;{{$user->last_name}}</h5>
                    <p class="mb-2 text-muted">{{ implode(" - ",$user->getRoleNames()->toArray() )}}</p>
                </div>
                <div class="col-md-8 mt-md-4">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#!" class="mb-1 text-muted d-flex align-items-end text-h-primary"><i class="feather icon-user mr-2 f-18"></i>{{$user->student->dni}}</a>
                            <div class="clearfix"></div>
                            <a href="mailto:demo@domain.com" class="mb-1 text-muted d-flex align-items-end text-h-primary"><i class="feather icon-mail mr-2 f-18"></i>{{$user->email}}</a>
                            <div class="clearfix"></div>
                            <a href="#!" class="mb-1 text-muted d-flex align-items-end text-h-primary"><i class="feather icon-phone mr-2 f-18"></i>{{$user->student->phone}}</a>
                        </div>
                        <div class="col-md-6">
                            <div class="media">
                                <i class="feather icon-map-pin mr-2 mt-1 f-18"></i>
                                <div class="media-body">
                                    <p class="mb-0 text-muted">{{$user->address->parish->canton->province->name_province}}</p>
                                    <p class="mb-0 text-muted">{{$user->address->parish->canton->name_canton}} | {{$user->address->parish->name_parish}}</p>
                                    <p class="mb-0 text-muted">{{$user->address->address}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs profile-tabs nav-fill" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link text-reset {{$position == 'tb_home'?'active':''}}" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="feather icon-home mr-2"></i>Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-reset {{$position == 'tb_profile'?'active':''}}" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="feather icon-user mr-2"></i>Perfil</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- profile header end -->
<!-- profile body start -->
<div class="row">
    <div class="col-md-8 order-md-2">
        <div class="tab-content" id="myTabContent" wire:ignore>
            <div class="tab-pane fade {{$position == 'tb_home' ? 'show active' : ''}}" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="card">
                    <div class="card-header">
                        <h5 class="font-weight-normal"><a href="#!" class="text-h-primary text-reset"><b class="font-weight-bolder">Josephin Doe</b></a> posted on your timeline</h5>
                        <p class="mb-0 text-muted">50 minutes ago</p>
                        <div class="card-header-right">
                            <div class="btn-group card-option">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal"></i>
                                </button>
                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a> </li>
                                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <a href="#!"><img src="assets/images/profile/bg-1.jpg" alt="" class="img-fluid"></a>
                    <div class="card-body">
                        <a href="#!" class="text-h-primary">
                            <h6>The new Lorem Ipsum is simply</h6>
                        </a>
                        <p class="text-muted mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                    <div class="card-body border-top border-bottom">
                        <ul class="list-inline m-0">
                            <li class="list-inline-item"><a href="#!" class="text-danger text-h-danger"><i class="feather icon-heart-on mr-2"></i>Like</a></li>
                            <li class="list-inline-item"><a href="#!" class="text-muted text-h-primary"><i class="feather icon-message-square mr-2"></i>Comment</a></li>
                            <li class="list-inline-item"><a href="#!" class="text-muted text-h-primary"><i class="feather icon-share-2 mr-2"></i>Share</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-between mb-4">
                            <div class="col-auto"><a href="#!" class="text-muted text-h-primary">Comment (50)</a></div>
                            <div class="col-auto"><a href="#!" class="text-muted text-h-primary">See All</a></div>
                        </div>
                        <div class="media mb-0">
                            <img src="assets/images/user/avatar-2.jpg" alt="user image" class="img-radius wid-30 align-top m-r-15">
                            <div class="media-body">
                                <a href="#!">
                                    <h6 class="mb-0 text-h-primary">Alex aasa Thompson</h6>
                                </a>
                                <p class="m-b-0">Looking Very nice type and aasas asasa scrambled
                                    <a href="#!" class="text-muted text-h-danger ml-1"><small>Like</small></a>
                                    <a href="#!" class="text-muted text-h-primary ml-1"><small>Comment</small></a>
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="media mb-0">
                            <img src="assets/images/user/avatar-3.jpg" alt="user image" class="img-radius wid-30 align-top m-r-15">
                            <div class="media-body">
                                <a href="#!">
                                    <h6 class="mb-0 text-h-primary">Alex Thompson</h6>
                                </a>
                                <p class="m-b-0">Nice Pic printing and typesetting industry
                                    <a href="#!" class="text-muted text-h-danger ml-1"><small>Like</small></a>
                                    <a href="#!" class="text-muted text-h-primary ml-1"><small>Comment</small></a>
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="media mb-0">
                            <img src="assets/images/user/avatar-1.jpg" alt="user image" class="img-radius wid-40 align-top m-r-15">
                            <div class="media-body">
                                <div class="form-group">
                                    <label class="floating-label" for="comment1">Write comment hear !. . .</label>
                                    <input type="text" class="form-control" id="comment1">
                                    <div class="form-icon">
                                        <button class="btn btn-primary btn-icon">
                                            <i class="feather icon-message-circle"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="font-weight-normal"><a href="#!" class="text-h-primary text-reset"><b class="font-weight-bolder">Josephin Doe</b></a> posted on your timeline</h5>
                        <p class="mb-0 text-muted">50 minutes ago</p>
                        <div class="card-header-right">
                            <div class="btn-group card-option">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal"></i>
                                </button>
                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i>
														Restore</span></a></li>
                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a>
                                    </li>
                                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <a href="#!"><img src="assets/images/profile/bg-2.jpg" alt="" class="img-fluid"></a>
                    <div class="card-body">
                        <a href="#!" class="text-h-primary">
                            <h6>The new Lorem Ipsum is simply</h6>
                        </a>
                        <p class="text-muted mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                    <div class="card-body border-top border-bottom">
                        <ul class="list-inline m-0">
                            <li class="list-inline-item"><a href="#!" class="text-muted text-h-danger"><i class="feather icon-heart mr-2"></i>Like</a></li>
                            <li class="list-inline-item"><a href="#!" class="text-muted text-h-primary"><i class="feather icon-message-square mr-2"></i>Comment</a></li>
                            <li class="list-inline-item"><a href="#!" class="text-muted text-h-primary"><i class="feather icon-share-2 mr-2"></i>Share</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-between mb-4">
                            <div class="col-auto"><a href="#!" class="text-muted text-h-primary">Comment (50)</a></div>
                            <div class="col-auto"><a href="#!" class="text-muted text-h-primary">See All</a></div>
                        </div>
                        <div class="media mb-0">
                            <img src="assets/images/user/avatar-3.jpg" alt="user image" class="img-radius wid-30 align-top m-r-15">
                            <div class="media-body">
                                <a href="#!">
                                    <h6 class="mb-0 text-h-primary">Alex Thompson</h6>
                                </a>
                                <p class="m-b-0">Looking Very nice type and scrambled
                                    <a href="#!" class="text-muted text-h-danger ml-1"><small>Like</small></a>
                                    <a href="#!" class="text-muted text-h-primary ml-1"><small>Comment</small></a>
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="media mb-0">
                            <img src="assets/images/user/avatar-1.jpg" alt="user image" class="img-radius wid-40 align-top m-r-15">
                            <div class="media-body">
                                <div class="form-group">
                                    <label class="floating-label" for="comment2">Write comment hear !. . .</label>
                                    <input type="text" class="form-control" id="comment2">
                                    <div class="form-icon">
                                        <button class="btn btn-primary btn-icon">
                                            <i class="feather icon-message-circle"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="font-weight-normal"><a href="#!" class="text-h-primary text-reset"><b class="font-weight-bolder">Josephin Doe</b></a> posted on your timeline</h5>
                        <p class="mb-0 text-muted">50 minutes ago</p>
                        <div class="card-header-right">
                            <div class="btn-group card-option">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal"></i>
                                </button>
                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i>
														Restore</span></a></li>
                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a>
                                    </li>
                                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <a href="#!"><img src="assets/images/profile/bg-3.jpg" alt="" class="img-fluid"></a>
                    <div class="card-body">
                        <a href="#!" class="text-h-primary">
                            <h6>The new Lorem Ipsum is simply</h6>
                        </a>
                        <p class="text-muted mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                    <div class="card-body border-top border-bottom">
                        <ul class="list-inline m-0">
                            <li class="list-inline-item"><a href="#!" class="text-muted text-h-danger"><i class="feather icon-heart mr-2"></i>Like</a></li>
                            <li class="list-inline-item"><a href="#!" class="text-muted text-h-primary"><i class="feather icon-message-square mr-2"></i>Comment</a></li>
                            <li class="list-inline-item"><a href="#!" class="text-muted text-h-primary"><i class="feather icon-share-2 mr-2"></i>Share</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-between mb-4">
                            <div class="col-auto"><a href="#!" class="text-muted text-h-primary">Comment (0)</a></div>
                            <div class="col-auto"><a href="#!" class="text-muted text-h-primary">See All</a></div>
                        </div>
                        <div class="media mb-0">
                            <img src="assets/images/user/avatar-1.jpg" alt="user image" class="img-radius wid-40 align-top m-r-15">
                            <div class="media-body">
                                <div class="form-group">
                                    <label class="floating-label" for="comment3">Write comment hear !. . .</label>
                                    <input type="text" class="form-control" id="comment3">
                                    <div class="form-icon">
                                        <button class="btn btn-primary btn-icon">
                                            <i class="feather icon-message-circle"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade {{$position == 'tb_profile' ? 'show active' : ''}}" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Información Personal</h5>

                    </div>
                    <div class="card-body border-top pro-det-edit collapse show" id="pro-det-edit-1">
                        <form>
                            <div class="form-group row">
                                <label class="col-sm-3  font-weight-bolder">DNI</label>
                                <div class="col-sm-9">
                                    {{$user->student->dni}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3  font-weight-bolder">Nombres</label>
                                <div class="col-sm-9">
                                    {{$user->student->name}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3  font-weight-bolder">Apellidos</label>
                                <div class="col-sm-9">
                                    {{$user->student->last_name}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3  font-weight-bolder">Fecha de Nacimiento</label>
                                <div class="col-sm-9">
                                    {{$user->student->birth_date}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3  font-weight-bolder">Estado Civil</label>
                                <div class="col-sm-9">
                                    {{$user->student->marital_status}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3  font-weight-bolder">Provincia</label>
                                <div class="col-sm-9">
                                    {{$user->address->parish->canton->province->name_province}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3  font-weight-bolder">Canton</label>
                                <div class="col-sm-9">
                                    {{$user->address->parish->canton->name_canton}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3  font-weight-bolder">Parroquia</label>
                                <div class="col-sm-9">
                                    {{$user->address->parish->name_parish}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3  font-weight-bolder">Dirección</label>
                                <div class="col-sm-9">
                                    {{$user->address->address}}
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Información de Contacto</h5>
                        <button wire:click="edit({{$user->student->id}})" type="button" class="btn btn-primary btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".pro-dont-edit" aria-expanded="false" aria-controls="pro-dont-edit-1 pro-dont-edit-2">
                            <i class="feather icon-edit"></i>
                        </button>
                    </div>
                    <div class="card-body border-top pro-dont-edit collapse show" id="pro-dont-edit-1">
                        <form>
                            <div class="form-group row">
                                <label class="col-sm-3  font-weight-bolder">Télefono</label>
                                <div class="col-sm-9">
                                    {{$user->student->phone}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3  font-weight-bolder">Correo</label>
                                <div class="col-sm-9">
                                    {{$user->email}}
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body border-top pro-dont-edit collapse " id="pro-dont-edit-2">
                        <form>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label font-weight-bolder">Teléfono</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Teléfono" wire:model.defer="phone">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label font-weight-bolder">Correo</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly class="form-control" placeholder="Correo" wire:model.defer="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label "></label>
                                <div class="col-sm-9">
                                    <button type="button" class="btn btn-sm btn-primary" wire:click="update()">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Cambio de contraseña</h5>
                        <button wire:click="edit({{$user->student->id}})" type="button" class="btn btn-primary btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".pass-dont-edit" aria-expanded="false" aria-controls="pro-dont-edit-1 pro-dont-edit-3">
                            <i class="feather icon-edit"></i>
                        </button>
                    </div>

                    <div class="card-body border-top pass-dont-edit collapse " id="pro-dont-edit-3">
                        <form>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label font-weight-bolder">Contraseña</label>
                                <div class="col-sm-9">
                                    <input type="password"  id="password"  class="form-control"  placeholder="Contraseña"  wire:model.defer="password">
                                    <small class="form-control-feedback text-muted">Mínimo 8 caracteres.</small>
                                    @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label font-weight-bolder">Confirmar Contraseña</label>
                                <div class="col-sm-9">
                                    <input type="password" id="password_confirmation" class="form-control" placeholder="Confirmar Contraseña"  wire:model.defer="password_confirmation">
                                    <small class="form-control-feedback text-muted">Vuelva a escribir la
                                        contraseña.
                                    </small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label "></label>
                                <div class="col-sm-9">
                                    <button type="button" class="btn btn-sm btn-primary" wire:click="updatePassword()">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 order-md-1">
        <div class="card new-cust-card" wire:ignore>
            <div class="card-header">
                <h5>Compañeros de Curso</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="feather icon-more-horizontal"></i>
                        </button>
                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                            <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                            <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                            <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="cust-scroll" style="height:415px;position:relative;">
                <div class="card-body p-b-0">
                    @foreach($students as $student)
                        <div class="align-middle m-b-25">
                            <img src="{{asset($student->url_image)}}" alt="user image" class="img-radius align-top m-r-15" width="40" height="40">
                            <div class="d-inline-block">
                                <a href="#!">
                                    <h6>{{$student->name}}&nbsp;{{$student->last_name}}</h6>
                                </a>
                                <p class="m-b-0">Cheers!</p>
                                <span class="status active"></span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- profile body end -->

<div>
    <div class="row">
        <div class="col-md-8 order-md-2">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="font-weight-normal"><b class="font-weight-bolder">Nuevo rol</b></h5>
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
                        <div class="card-body border-top border-bottom">
                            @include('admin.dashboard.roles.form')
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 order-md-1">
            <div class="card new-cust-card">
                <div class="card-header">
                    <h5>Roles</h5>
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
                <div class="cust-scroll" style="height:auto;position:relative;">
                    <div class="card-body p-b-0">
                        @foreach($roles as $role)
                            <div class="align-middle m-b-25">
                                <div  class="d-inline-block">
                                    <ul style="list-style: none; margin-left: -25px;">
                                        <li><a href="javascript: return void();"><i class="fa fa-edit"></i></a></li>
                                        <li><a href="javascript: return void();"><i class="fa fa-trash text-danger"></i></a></li>
                                    </ul>
                                </div>
                                
                                <div  class="d-inline-block ml-2">
                                    <a href="javascript: return void();">
                                        <h6>{{$role->name}}</h6>
                                    </a>
                                    <small class="m-b-0">{{$role->description}}</small>
                                    <span @if($role->status == 0  )style="background-color:red;"@endif 
                                        class="status @if($role->status == 1  ) active @else active text-danger @endif"></span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    @if($show_list)
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="row align-items-center m-l-0">
                            <div class="col-sm-6 text-left">
                                <h5>{{$period->name}}</h5>
                            </div>
                        </div>
            
                        <ul class="list-inline mb-0">
                            @for($i = 0; $i < count($filters)-1; $i++)
                            <li class="list-inline-item border-right m-0">
                                <a  wire:click.prevent="slectLetter({{$i}})" href="javascript:void(0);" class="pr-2 pl-1 text-muted"> {{$filters[$i]}} </a>
                            </li>
                            @endfor
                        
                            <li class="list-inline-item"><a wire:click.prevent="slectLetter({{count($filters)-1}})" href="javascript:void(0);" class="font-weight-bolder"> Todos </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div hidden>  {{\Carbon\Carbon::setLocale('es')}} </div>
            @foreach($lists as $list)
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <a wire:click.prevent="show({{$list->id}})"href="javascript:void(0);">
                            <img  class="img-fluid card-img-top" src="{{asset($list->url_image)}}" alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <h5  class="card-title">{{$list->name}}</h5>
                            <p class="card-text">{{$list->description}}</p>
                            <p class="card-text">
                                <span class="text-muted">Publicado {{\Carbon\Carbon::parse($list->created_at)->diffForHumans()}}
                                </span>
                                <span class="text-info float-right">
                                    <a wire:click.prevent="show({{$list->id}})" href="javascript:void(0);">Ver más</a>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    @if(!is_null($education) && $show_detail)
        <div class="row">
            <div class="col-md-12 col-xl-12">
              
                <div class="card">
                    <div class="card-header">
                        <h5 class="font-weight-normal"><a href="javascript:void(0);" class="text-h-primary text-reset"><b class="font-weight-bolder">{{$education->name}}</h5>
                        <p class="mb-0 text-muted">{{\Carbon\Carbon::parse($education->created_at)->diffForHumans()}}</p>
                        <div class="card-header-right">
                            <button  wire:click.prevent="showList()" type="button" class="btn text-muted" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-arrow-left"></i> Regresar
                            </button>
                        </div>
                    </div>
                    
                    <a href="javascript:void(0);"><img src="{{asset($education->url_image)}}" alt="" class="img-fluid"></a>
                    <div class="card-body">
                        <a href="javascript:void(0);" class="text-h-primary">
                            <h6>Autor <span class="text-muted"> {{$education->user->name}} {{$education->user->last_name}}</span></h6>
                        </a>
                        <p class="text-muted mb-0">{{$education->description}}</p>
                    </div>
                    <div class="card-body">
                        <div class="media mb-0">
                           {!!$education->content!!}
                        </div>
                    </div>
                </div>
                    
            </div>
        
        </div>
    @endif
</div>

@extends('layouts.app')

@section('content')

<div class="auth-wrapper">
	<!-- [ reset-password ] start -->
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
                        <img height="100" width="200" src="{{asset('img/logo_pantallas.png')}}" alt="" class="img-fluid mb-4">
                        <h4 class="mb-3 f-w-400">Restablecer contraseña</h4>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="email" class="floating-label">{{ __('Correo electrónico') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                            </div>
                            <button type="submit" class="btn btn-block btn-primary mb-4"> {{ __('Enviar enlace ') }} </button>
                            <p class="mb-0 text-muted">Se enviará un enlace a tu correo electrónico para restablecer tu contraseña</p>


                        </form>
                    </div>
                     <a class="btn btn-link" href="{{ route('login') }}">
                                    {{ __('Regresar') }}
                                </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

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
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf


                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group mb-4">
                            <label for="email"  class="floating-label">{{ __('E-Mail Address') }}</label>


                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="form-group mb-4">
                            <label for="password"  class="floating-label">{{ __('Password') }}</label>


                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="form-group mb-4">
                            <label for="password-confirm" class="floating-label">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                        </div>

                                <button type="submit"  class="btn btn-block btn-primary mb-4">
                                    {{ __('Reset Password') }}
                                </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

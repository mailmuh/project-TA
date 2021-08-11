@extends('layouts.appauth')

@section('content')
    
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{asset('assetslogin/images/logo_pemkot.png') }}" alt="IMG">
				</div>
                <form method="POST" action="{{ route('password.email') }}" class="login100-form validate-form">
                    @csrf
					<span class="login100-form-title">
						Sistem Pemberian Bantuan Sosial<br>Dinas Sosial Kota Tegal<hr>Reset Password
					</span>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input id="email" name="email" class="input100 form-control @error('email') is-invalid @enderror" type="email" placeholder="Email" value="{{ old('email') }}">
                        
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
                            {{ __('Send Password Reset Link') }}
						</button>
					</div>
						
				</form>
			</div>
            <div class="col-sm-6 copyright">
                <center>
                    <p class="mbr-text mbr-fonts-style display-7 text-white">
                        <!-- © Copyright 2018 Serenidad Homes - All Rights Reserved -->
                        © Dinas Sosial Kota Tegal 2021
                    </p>
                </center>
            </div>
		</div>
	</div>

@endsection
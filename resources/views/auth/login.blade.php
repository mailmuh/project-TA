@extends('layouts.appauth')

@section('content')
    
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{asset('assetslogin/images/logo_pemkot.png') }}" alt="IMG">
				</div>
                <form id="sign_in" method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                    @csrf
					<span class="login100-form-title">
						Sistem Pemberian Bantuan Sosial<br>Dinas Sosial Kota Tegal
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input id="email" name="email" class="input100 form-control @error('email') is-invalid @enderror" type="email" placeholder="Email" value="{{ old('email') }}">
                        
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>Email yang anda masukkan tidak terdaftar</strong>
                            </span>
                        @enderror
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input id="password" name="password" class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>Password yang anda masukkan salah</strong>
                        </span>
                        @enderror
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
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
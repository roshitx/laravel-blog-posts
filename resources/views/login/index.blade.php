@extends('layouts.main')

@section('container')
	<div class="row d-flex justify-content-center">
		<div class="col-lg-5">

			{{-- Alert Succes Login --}}
			@if (session()->has('success'))
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					{{ session('success') }}
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			@endif
			{{-- End Alert Succes Login --}}

			<main class="form-signin w-100 m-auto">
				<h1 class="h3 fw-normal mb-3 text-center">Please login</h1>
				{{-- Alert Failed Login --}}
				@if (session()->has('loginError'))
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						{{ session('loginError') }}
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				@endif
				{{-- End Alert Failed Login --}}
				{{-- Form Login --}}
				<form action="/login" method="POST">
					@csrf

					{{-- Username field --}}
					<div class="form-floating">
						<input type="text" name="username" class="form-control @error('username') is-invalid" @enderror id="username"
							placeholder="username" value="{{ old('username') }}" autofocus required>
						<label for="username">Username</label>
					</div>
					{{-- End username field --}}

					{{-- Password field --}}
					<div class="form-floating">
						<input type="password" name="password" class="form-control" id="password" placeholder="Password">
						<label for="password">Password</label>
					</div>
					{{-- End password field --}}

					<button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
				</form>
				{{-- End Form Login --}}

				{{-- Belum Register? --}}
				<small class="d-block mt-3 text-center">Not registered yet?<a href="/register"> Register now!</a></small>
			</main>
		</div>
	</div>
@endsection

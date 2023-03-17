@extends('layouts.main')

@section('container')
	<div class="row d-flex justify-content-center">
		<div class="col-lg-5">
			<main class="form-registration w-100 m-auto">
				<h1 class="h3 fw-normal mb-3 text-center">Hello!</h1>
				{{-- Form registrasi --}}
				<form action="/register" method="post">
					@csrf
					{{-- Input nama --}}
					<div class="form-floating">
						<input type="text" name="name" class="form-control rounded-top @error('name') is-invalid" @enderror id="name"
							placeholder="Name" required value="{{ old('name') }}">
						<label for="name">Name</label>
						@error('name')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
						@enderror

					</div>
					{{-- Akhir input nama --}}

					{{-- Input username --}}
					<div class="form-floating">
						<input type="text" name="username" class="form-control @error('username') is-invalid" @enderror id="username"
							placeholder="Username" required value="{{ old('username') }}">
						<label for="username">Username</label>
						@error('username')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
						@enderror
					</div>
					{{-- Akhir input username --}}

					{{-- Input email --}}
					<div class="form-floating">
						<input type="email" name="email" class="form-control @error('email') is-invalid" @enderror id="email"
							placeholder="name@example.com" required value="{{ old('email') }}">
						<label for="email">Email address</label>
						@error('email')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
						@enderror
					</div>
					{{-- Akhir input email --}}

					{{-- Input password --}}
					<div class="form-floating">
						<input type="password" name="password"
							class="form-control rounded-bottom @error('password') is-invalid" @enderror id="password" placeholder="Password"
							required value="{{ old('password') }}">
						<label for="password">Password</label>
						@error('password')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
						@enderror
					</div>
					{{-- Akhir input password --}}

					{{-- Button register --}}
					<button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
				</form>
				{{-- Akhir form --}}
				<small class="d-block mt-3 text-center">Already registered?<a href="/login"> Login</a></small>
			</main>
		</div>
	</div>
@endsection

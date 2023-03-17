@extends('dashboard.layouts.main')

@section('container')
	<div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
		<h1 class="h2">Edit Category</h1>
	</div>


    <div class="col-lg-8 mb-5">
		<form method="POST" action="/dashboard/categories/{{ $category->slug }}" enctype="multipart/form-data">
			@method('put')
			@csrf

			{{-- Field Title --}}
			<div class="mb-3">
				<label for="name" class="form-label">Name</label>
				<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
					autofocus value="{{ old('name', $category->name) }}">
				@error('name')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>
			{{-- Akhir Field Title --}}

			{{-- Field Slug --}}
			<div class="mb-3">
				<label for="slug" class="form-label">Slug</label>
				<input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" readonly
					value="{{ old('slug', $category->slug) }}">
				@error('slug')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>
			{{-- Akhir Field Slug --}}

            <button type="submit" class="btn btn-primary">Edit Category</button>
		</form>
    </div>

    <script>
		const name = document.querySelector('#name');
		const slugs = document.querySelector('#slug');

		name.addEventListener('change', function() {
			fetch('/dashboard/category/checkSlug?name=' + name.value + '')
				.then(response => response.json())
				.then(data => slugs.value = data.slug)
		});
	</script>
@endsection
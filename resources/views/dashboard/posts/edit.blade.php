@extends('dashboard.layouts.main')

@section('container')
	<div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
		<h1 class="h2">Edit Post</h1>
	</div>

	<div class="col-lg-8 mb-5">
		<form method="POST" action="/dashboard/posts/{{ $post->slug }}" enctype="multipart/form-data">
			@method('put')
			@csrf

			{{-- Field Title --}}
			<div class="mb-3">
				<label for="title" class="form-label">Title</label>
				<input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
					autofocus value="{{ old('title', $post->title) }}">
				@error('title')
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
					value="{{ old('slug', $post->slug) }}">
				@error('slug')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>
			{{-- Akhir Field Slug --}}

			{{-- Field Category --}}
			<div class="mb-3">
				<label for="category" class="form-label">Category</label>
				<select class="form-select" name="category_id">
					@foreach ($categories as $category)
						@if (old('category_id', $post->category->id) == $category->id)
							<option value="{{ $category->id }}" selected>{{ $category->name }}</option>
						@else
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endif
					@endforeach
				</select>
			</div>
			{{-- Akhir Field Category --}}

			{{-- Update Image --}}
			<div class="mb-3">
				<label for="image" class="form-label">Post Image</label>
				<input type="hidden" name="oldImage" value="{{ $post->image }}">
				@if ($post->image)
					<img src="{{ asset('storage/' . $post->image) }}" class="img-preview img-fluid col-sm-5 mb-3 d-block">
				@else
					<img class="img-preview img-fluid col-sm-5 mb-3">
				@endif
				
				<input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"
					onchange="previewImage()">
				@error('image')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>
			{{-- Akhir Update Image --}}

			{{-- Field Body --}}
			<div class="mb-3">
				<label for="body" class="form-label">Body</label>
				@error('body')
					<p class="text-danger">{{ $message }}</p>
				@enderror
				<input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
				<trix-editor input="body"></trix-editor>
			</div>
			{{-- Akhir Field Body --}}

			<button type="submit" class="btn btn-primary">Update Post</button>
		</form>
	</div>

	<script>
		const title = document.querySelector('#title');
		const slugs = document.querySelector('#slug');

		title.addEventListener('change', function() {
			fetch('/dashboard/post/checkSlug?title=' + title.value + '')
				.then(response => response.json())
				.then(data => slugs.value = data.slug)
		});

		document.addEventListener('trix-file-accept', function(e) {
			e.preventDefault();
		})

		function previewImage() {
			const image = document.querySelector('#image');
			const imgPreview = document.querySelector('.img-preview');

			imgPreview.style.display = 'block';

			const oFReader = new FileReader();
			oFReader.readAsDataURL(image.files[0]);

			oFReader.onload = function(oFREvent) {
				imgPreview.src = oFREvent.target.result;
			}
		}
	</script>
@endsection

@extends('dashboard.layouts.main')

@section('container')
	<div class="container">
		<div class="row my-4">
			<div class="col-lg-8">
				<h2 class="text-decoration-none mb-3">{{ $post->title }}</h2>

				{{-- Button back --}}
				<a href="/dashboard/posts" class="btn btn-success d-inline-block">
                    <span data-feather="arrow-left"></span>
                    <span class="d-inline-block ms-1 align-middle">Back to my posts</span>
                </a>
				{{-- Akhir Button back --}}

				{{-- Button edit --}}
				<a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning d-inline-block">
                    <span data-feather="edit"></span>
                    <span class="d-inline-block ms-1 align-middle">Edit</span>
                </a>
				{{-- Akhir button edit --}}

				{{-- Button delete --}}
				<form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
					@method('delete')
					@csrf
					<input type="hidden" name="item_id" value="{{ $post->id }}">
					<button class="delete-btn btn btn-danger d-inline-block" id="delete">
						<span data-feather="x-circle"></span>
						<span class="d-inline-block ms-1 align-middle">Delete</span>
					</button>
				</form>
				{{-- Akhir button delete --}}

				{{-- Image --}}
				@if ($post->image)
					<div style="max-height: 350px; overflow: hidden;">
						<img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
						class="img-fluid mt-3">
					</div>
				@else
					<img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}"
					class="img-fluid mt-3">
				@endif
				
				{{-- Akhir image --}}

				{{-- Body --}}
				<article class="my-3">
					{!! $post->body !!}
				</article>
				{{-- Akhir body --}}
			</div>
		</div>
	</div>

    <script>
        // Sweetalert success delete
		const deleteButtons = document.querySelectorAll('.delete-btn');

		deleteButtons.forEach(function(button) {
			button.addEventListener('click', function(e) {
				e.preventDefault();

				const itemId = button.parentNode.querySelector('input[name="item_id"]').value;

				Swal.fire({
					title: 'Are you sure?',
					text: "You won't be able to revert this!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, delete it!',
				}).then(function(result) {
					if (result.isConfirmed) {
						Swal.fire(
							'Deleted!',
							'Your file has been deleted.',
							'success'
						)
						button.parentNode.submit();
					}
				});
			});
		});
    </script>
@endsection

@extends('dashboard.layouts.main')

@section('container')
	<div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
		<h1 class="h2">Post Categories</h1>
	</div>

	<div class="table-responsive col-lg-6">
		{{-- Alert success add post --}}
		@if (session()->has('success'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill"
					viewBox="0 0 16 16" style="vertical-align: middle;">
					<path
						d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
				</svg>
				{{ session('success') }}
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		@endif
		{{-- Akhir alert success --}}

		{{-- Button create category --}}
		<a href="/dashboard/categories/create" class="btn btn-primary d-inline-block mb-3">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle"
				viewBox="0 0 16 16">
				<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
				<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
			</svg>
			<span class="d-inline-block align-middle">Create new category</span></a>
		{{-- Akhir button create category --}}

		<table class="table-striped table-sm table">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Category name</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($categories as $category)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $category->name }}</td>
						<td>
							<a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                            
							<form action="/dashboard/categories/{{ $category->slug }}" method="POST" class="d-inline">
								@method('delete')
								@csrf
								<input type="hidden" name="item_id" value="{{ $category->id }}">
								<button class="delete-btn badge bg-danger border-0" id="delete"><span data-feather="x-circle"></span></button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
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

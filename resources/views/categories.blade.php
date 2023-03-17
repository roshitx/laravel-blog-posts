@extends('layouts.main')

@section('container')
    <h1 class="mb-5">Post Categories</h1>


   
        
    
    <div class="container">
        <div class="row"> 
            @foreach ($categories as $category)
            <div class="col-md-4 mb-5">
                <a href="/post?category={{ $category->slug }}" class="text-decoration-none text-light">
                    <div class="card text-bg-dark">
                        <img src="https://source.unsplash.com/500x500?{{ $category->name }}" alt="{{ $category->name }}" class="card-img" alt="...">
                        <div class="card-img-overlay d-flex align-items-center p-0">
                        <h5 class="card-title text-center flex-fill fs-3 p-4" style="background-color: rgba(0,0,0,0.5)">{{ $category->name }}</h5>
                    </div>
                  </div>
                </a>
            </div
            >@endforeach
        </div>
    </div>
@endsection
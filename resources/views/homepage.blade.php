@extends('layout')

@section('content')
    <div class="d-flex flex-column text-center">
        <div class="mb-2">
            <img src="images/logo.png" alt="" width="200px">
        </div>
        <div class="mb-2">
            <a href={{ route('add.movies') }} class="btn btn-primary">Add New Movies</a>
        </div>
    </div>

    <div class="row">
        @foreach($movies as $movie)
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="{{ asset('storage/'.$movie->photo) }}" class="card-img-top" alt="{{ $movie->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $movie->title }}</h5>
                    <p class="card-text">
                        <strong>Genre:</strong> {{ $movie->genre->name }} <br>
                        <strong>Publish Date:</strong> {{ $movie->publish_date }} <br>
                        {{ $movie->description }}
                    </p>
                </div>
                <div class="card-footer">
                    <form action="{{ route('delete.movies', $movie->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $movies->links() }}
    </div>
    
@endsection
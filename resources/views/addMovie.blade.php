@extends('layout')

@section('content')
    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <form action="{{ route('store.movies') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="genre_id" class="form-label">Genre</label>
                    <select name="genre_id" id="genre_id" class="form-select @error('genre_id') is-invalid @enderror">
                        <option value="">Choose the genre</option>
                        @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>
                            {{ $genre->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('genre_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label">Photo</label>
                    <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror">
                    @error('photo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="publish_date" class="form-label">Publish Date</label>
                    <input type="date" name="publish_date" id="publish_date" value="{{ old('publish_date') }}" class="form-control @error('publish_date') is-invalid @enderror">
                    @error('publish_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Add New Movie</button>
            </form>
        </div>
    </div>    
@endsection
@extends('layouts.app')

@section('content')
    <div class="container w-75 m-auto pt-4">
        <a href="{{route('admin.projects.index', $project)}}" class="btn btn-outline-secondary text-uppercase mb-3">Back</a>
        <h1 class="text-uppercase fs-5 fw-bold pb-2">Edit the project: {{ $project->name }}</h1>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $project->name) }}" placeholder="project name">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="client_name" class="form-label">Type</label>
                <select class="form-select" name="type_id">
                    <option value="" selected>Select a type</option>
                    @foreach ($types as $type)
                        <option
                        @if ($type->id == old('type_id', $project->type?->id)) selected @endif
                        value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
             <div class="mb-3">
                <label for="client_name" class="form-label">Client Name</label>
                <input type="text" class="form-control @error('client_name') is-invalid @enderror" name="client_name" id="client_name" value="{{ old('client_name', $project->client_name) }}"  placeholder="client name">
                @error('client_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="summary" class="form-label">Summary</label>
                <textarea class="form-control @error('summary') is-invalid @enderror" id="summary" name="summary" placeholder="Insert a summary" rows="3"></textarea>
                @error('summary')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
             <div class="mb-3">
                <label for="cover_image" class="form-label">URL Image</label>
                <input onchange="showImage(event)" type="file" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image" id="cover_image" value="{{ old('cover_image', $project->cover_image) }}" placeholder="URL Image">
                @error('cover_image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div class="image mt-2">
                    <img width="120" id="output-image" src="" alt="">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
    <script>
        ClassicEditor
        .create( document.querySelector( '#summary' ), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
        } )
        .catch( error => {
            console.error( error );
        } );
       function showImage(event){
        const tagImage = document.getElementById('output-image');
        tagImage.src = URL.createObjectURL(event.target.files[0]);
    }
    </script>
@endsection

@section('title')
   | {{ $project->name }}
@endsection

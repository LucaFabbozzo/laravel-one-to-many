@extends('layouts.app')

@section('content')
    <div class="container w-75 m-auto text-center pt-2 text">
        <a href="{{route('admin.projects.index')}}" class="btn btn-outline-secondary text-uppercase my-4">Back to the List</a>
        <div class="card m-auto p-2 mb-5" style="width: 70%;">
         <img style="width: 40%" src="{{asset('storage/'. $project->cover_image)}}" class="card-img-top m-auto" alt="{{$project->image_original_name}}">
            <div class="card-body">
                <h4 class="card-title fs-2">{{$project->name}}</h4>
                <p class="card-title fs-4">{{$project->client_name}}</p>
                <p class="card-text fs-6">{!! $project->summary !!}</p>
            </div>
        </div>
    </div>
@endsection

@section('title')
   | {{ $project->name }}
@endsection

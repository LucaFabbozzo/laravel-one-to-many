@extends('layouts.app')

@section('content')
    <div class="container w-100 m-auto pt-3 p-4">
            <h1 class="fs-5 text-uppercase">My Projects List</h1>
          @if (session('deleted'))
             <div class="alert alert-success" role="alert">
                {{session('deleted')}}
             </div>
          @endif
            <form class="py-2" action="{{route('admin.projects.index')}}" method="GET">
                @csrf
                <input class="form-control d-inline-block w-50" type="text" name="search" placeholder="Find something into my projects">
                <button class="btn btn-outline-secondary mb-1" type="submit">Find</button>
            </form>
        <table class="table table-striped mb-4">
            <thead>
                <tr>
                    <th scope="col"><a class="text-decoration-none text-dark" href="{{ route('admin.projects.orderby', ['id', $direction]) }}">ID</a></th>
                    <th scope="col"><a class="text-decoration-none text-dark" href="{{ route('admin.projects.orderby', ['cover_image', $direction]) }}">Cover</a></th>
                    <th scope="col"><a class="text-decoration-none text-dark" href="{{ route('admin.projects.orderby', ['name', $direction]) }}">Name</a></th>
                    <th scope="col"><a class="text-decoration-none text-dark" href="{{ route('admin.projects.orderby', ['client_name', $direction]) }}">Client Name</a></th>
                    <th scope="col"><a class="text-decoration-none text-dark" href="{{ route('admin.projects.orderby', ['summary', $direction]) }}">Summary</a></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td><img style="width: 60px" src="{{asset('storage/'. $project->cover_image)}}" alt="{{$project->image_original_name}}"></td>
                    <td>{{ $project->name }} <span class="badge text-bg-dark">{{ $project->type->name }}</span></td>
                    <td>{{ $project->client_name }}</td>
                    <td>{!! $project->summary !!}</td>
                    <td><a class="btn btn-outline-primary" href="{{route('admin.projects.show', $project)}}"><i class="fa-solid fa-eye"></i></a></td>
                    <td><a class="btn btn-outline-success" href="{{route('admin.projects.edit', $project)}}"><i class="fa-regular fa-pen-to-square"></i></a></td>
                     <td>
                        @include('admin.partials.form-delete')
                    </td>
                </tr>
                @empty
                <h2>No result</h2>
                @endforelse
            </tbody>
        </table>
         <div class="pag-box">
            {{$projects->links()}}
        </div>
    </div>
@endsection

@section('title')
   | Admin
@endsection

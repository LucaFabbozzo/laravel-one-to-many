@extends('layouts.app')

@section('content')
    <div class="container w-75 m-auto text-center pt-2 text">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Type</th>
                    <th scope="col">Project</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($types as $type )
                <tr>
                    <td>{{ $type->name }}</td>
                    <td>
                        <ul>
                            @foreach ($type->types as $project )
                                <li class="list-unstyled"><a href="{{ route('admin.projects.show' , $project) }}">{{ $project->name }}</a></li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4"><h3>Nessun Risulatato</h3></td>
                </tr>
                @endforelse
            </tbody>
     </table>
    </div>
@endsection

@section('title')

@endsection

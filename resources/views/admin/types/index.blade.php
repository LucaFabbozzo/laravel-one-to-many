@extends('layouts.app')

@section('content')
    <div class="container w-75 m-auto text-center pt-2 text">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{session('message')}}
             </div>
         @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Type</th>
                    <th scope="col">Pojects Count</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($types as $type )
                <tr>
                    <td>
                        <form action="{{ route('admin.types.update', $type) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <input type="text" class="border-0" name="name" value="{{ $type->name }}">
                            <button type="submit" class="btn btn-outline-warning">Update</button>
                        </form>
                    </td>
                    <td>{{ count($type->types) }}</td>
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

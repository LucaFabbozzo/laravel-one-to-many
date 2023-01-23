@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="py-4 fs-3">Dashboard</h1>
    </div>
    <div class="container-fluid m-auto pt-2">
        <div class="box p-3 text-dark bg-light">
            <h3>Hello! <span class="fs-3 text-muted">{{ Auth::user()->name }}</span></h3>
            <h3>Welcome to your Admin page!</h3>
            <p class="text-muted">We are assembled some links to get your started</p>
            <p class="fs-4">Get Started!</p>
            <p class="text-muted">Total Projects: {{ $count_project }}</p>
            <a class="btn btn-outline-primary fw-light text-uppercase create" href="{{route('admin.projects.create')}}">Add new project</a>
        </div>
    </div>
@endsection

@section('title')
   | Admin
@endsection

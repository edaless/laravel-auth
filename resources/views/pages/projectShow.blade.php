@extends('layouts.main-layout')

@section('content')
<div class="container">
    
    <h1>{{ $project -> name }}</h1>
    <img class="imgShow" src="{{ asset('storage/' . $project -> main_image) }}" alt="">
    
    <p>
        {{ 
            $project -> description 
            ? $project -> description 
            : "- no description -"
        }}
    </p>
    <div>{{ $project -> release_date }}</div>
    <a href="{{ $project -> repo_link }}">Repo</a>

    <hr>
    <a href="{{route('admin.project.edit', $project)}}">EDIT</a>-<a href="{{route('admin.project.delete', $project)}}">DELETE</a>
    
</div>
@endsection
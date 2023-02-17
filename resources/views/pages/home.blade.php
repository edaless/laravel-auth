@extends('layouts.main-layout')

@section('content')
    
    <h1>projects</h1>
    <a href="{{route('admin.project.store')}}">
        CREATE A NEW PROJECT
    </a>
    <ul>
        @foreach ($projects as $project)

            <li>
                <img src="{{$project -> main_image}}" alt=""class="immagine">
                <br>
                
                <a href="{{ route('project.show', $project) }}">
                    {{ $project -> name }}
                </a>
            
            </li>
            
        @endforeach
    </ul>

@endsection
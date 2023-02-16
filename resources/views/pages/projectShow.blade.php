@extends('layouts.main-layout')

@section('content')
    
    <h1>{{ $project -> name }}</h1>
    <p>
        {{ 
            $project -> description 
            ? $project -> description 
            : "- no description -"
        }}
    </p>
    <img src="{{ $project -> main_image }}" alt="">

@endsection
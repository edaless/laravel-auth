@extends('layouts.main-layout')

@section('content')
<div class="container">
    
    <h1>CREATE</h1>
    <form method="POST" action="{{route('admin.project.update', $project)}}" enctype="multipart/form-data">
        @csrf    

        <label for="name">Name</label>
        <input type="text" name="name" value="{{$project->name}}" >
        <br>
        <label for="description">description</label>
        <input type="text" name="description" value="{{$project->description}}" >
        <br>
        <label for="main_image">main image</label>
        <input type="file" name="main_image" value="{{$project->main_image}}" >
        <br>
        <label for="release_date">release date</label>
        <input type="date" name="release_date" value="{{$project->release_date}}" >
        <br>
        <label for="repo_link">repo link</label>
        <input type="text" name="repo_link" value="{{$project->repo_link}}" >
        <br>
        
        <input type="submit" value="UPDATE PROJECT">
    </form>
    
    
</div>
@endsection
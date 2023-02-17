@extends('layouts.main-layout')

@section('content')
<div class="container">
    
    <h1>CREATE</h1>
    <form method="POST" action="{{route('admin.project.create')}}">
        @csrf    

        <label for="name">Name</label>
        <input type="text" name="name">
        <br>
        <label for="description">description</label>
        <input type="text" name="description">
        <br>
        <label for="main_image">main image</label>
        <input type="text" name="main_image">
        <br>
        <label for="release_date">release date</label>
        <input type="date" name="release_date">
        <br>
        <label for="repo_link">repo link</label>
        <input type="text" name="repo_link">
        <br>
        
        <input type="submit" value="CREATE NEW PROJECT">
    </form>
    
    
</div>
@endsection
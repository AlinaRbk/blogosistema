@extends('layouts.app')

@section('content')
<div class="container">

<a class="btn btn-primary" href="{{route('category.create')}}">Create Category</a>


<form method="GET" action="{{route('category.index')}}">
    @csrf
     
       

<table class="table table-striped">
    <tr>
        <th>@sortablelink('id', 'ID')</th>
        <th>@sortablelink('title','Title')</th>
        <th>@sortablelink('description','Description')</th>
    </tr>

  
        @foreach ($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->title}}</td>
            <td>{{$category->description}}</td>
        </tr> 
        @endforeach
     

@endsection
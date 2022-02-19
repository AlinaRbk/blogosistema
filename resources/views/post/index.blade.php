@extends('layouts.app')

@section('content')
<div class="container">
<form method="GET" action="{{route('post.index')}}">
    @csrf
    <select name="sortCollumn">
        @foreach ($select_array as $key=>$item)
        {{$key}}
            @if($item == $sortCollumn || ($key == 0 && empty($sortCollumn)) )
                <option value="{{$item}}" selected>{{$item}}</option>
            @else 
                <option value="{{$item}}" >{{$item}}</option>
            @endif
                
            @endforeach
    </select>    


<select name="sortOrder">
@if ($sortOrder == 'asc' || empty($sortOrder))
                <option value="asc" selected>Ascending</option>
                <option value="desc">Descending</option>
            @else 
                <option value="asc">Ascending</option>
                <option value="desc" selected>Descending</option>
            @endif
        </select>    
<button type="submit">Sort</button>


<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Category</th>
    </tr>

  
        @foreach ($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->description}}</td>
            <td>{{$post->postCategory->title}}</td>


        </tr> 
        @endforeach
     

@endsection
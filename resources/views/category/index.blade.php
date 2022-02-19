@extends('layouts.app')

@section('content')
<div class="container">
<form method="GET" action="{{route('category.index')}}">
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
    </tr>

  
        @foreach ($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->title}}</td>
            <td>{{$category->description}}</td>
        </tr> 
        @endforeach
     

@endsection
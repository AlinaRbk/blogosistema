@extends('layouts.app')

@section('content')
<div class="container">
<a class="btn btn-primary" href="{{route('post.create')}}">Create post</a>
<a class="btn btn-primary" href="{{route('category.create')}}">Create Category</a>
<form method="GET" action="{{route('post.index')}}">
    @csrf
    <select name="categories">
        <option value="all">All</option>
            @foreach ($categories as $category)
                @if ($category->id == $category_id)
                    <option value="{{$category->id}}" selected>{{$category->title}} </option>
                @else
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endif    
            @endforeach
    </select>
<select name="page_limit">
    @foreach ($paginationSettings as $setting)
        @if ($page_limit == $setting->value)
            <option selected value="{{ $setting->value }}"selected>{{ $setting->title }}</option>
        @else
            <option value="{{ $setting->value }}">{{ $setting->title }}</option>
        @endif
    @endforeach
</select>   

    
<button type="submit" class="btn btn-secondary">Sort</button>

</form>



<table class="table table-striped">
    <tr>
        <th>@sortablelink('id', 'ID')</th>
        <th>@sortablelink('title','Title')</th>
        <th>@sortablelink('description','Description')</th>
        <th>@sortablelink('category','Category')</th>
    </tr>

  
        @foreach ($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->description}}</td>
            <td>{{$post->postCategory->title}}</td>


        </tr> 
        @endforeach
</table>
@if ($page_limit != 1) 
    {!! $posts->appends(Request::except('page'))->render() !!}
@endif 
</div>   

@endsection
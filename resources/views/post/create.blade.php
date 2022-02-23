@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('post.store')}}">
        @csrf
        <div class="form-group">
            <label for="post_title">Title</label>
            <input class="form-control" type='text' name='post_title' />
        </div>
        <div class="form-group">
            <label for="post_description">Description</label>
            <textarea class="form-control" name='post_description'> 
            </textarea>
        </div>
        <div class="form-group category_select">
            <label for="post_categoryid">category</label>
            <select class='form-select' name="post_categoryid">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option> 
                @endforeach
            </select> 
        </div>
        <div class="form-group">
            <label for="post_newcategory">Add new category?</label>
            <input id="post_newcategory" type="checkbox" name="post_newcategory"/>

        </div>
        <div class="category_info d-none">
            <div class="form-group">
                <label for="category_name">Title</label>
                <input class="form-control" type='text' name='category_name' />
            </div>
            
            <div class="form-group">
                <label for="category_description">Description</label>
                <textarea class="form-control" name='category_description'> 
                </textarea>

            </div>

        </div>           
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>        
    </form>    
</div>
<script>

    $(document).ready(function(){
    $('#post_newcategory').click(function(){
    $(".category_info").toggleClass('d-none');
    $(".category_select").toggleClass('d-none');
        })
    })
</script>    
@endsection
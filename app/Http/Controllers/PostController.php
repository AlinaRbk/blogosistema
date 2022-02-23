<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\PaginationSetting;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $sortCollumn = $request->sortCollumn;
        $sortOrder = $request->sortOrder;

        $tem_post = Post::all();
        $post_collumns = array_keys($tem_post->first()->getAttributes());
        $select_array =  $post_collumns;
        
        $category = $request->Categories;
        $categories = Category::all();
        $category_id = $request->category_id;

        $paginate = $request->paginateSetting;
        $paginationSettings = PaginationSetting::where('visible', '=' , 1)->get();
        $page_limit = $request->page_limit;
    
        if (($category == 'all') || (empty($category))) {
            if ($paginate == 'all') {
                $posts = Post::sortable()->get();
           } else {
                $posts = Post::sortable()->paginate($paginate);
                }
            }else {
                if ($paginate == 'all') {
                $posts = Post::where('category_id','=',$category_id)->sortable()->get(); 
            }else {
                $posts = Post::where('category_id','=',$category_id)->sortable()->paginate($paginate);
                }
            }
  
        return view('post.index', ['posts'=> $posts,'categories'=>$categories,'category_id'=>$category_id, 'paginationSettings'=>$paginationSettings,'paginateSetting'=>$paginate, 'page_limit' => $page_limit,'select_array'=>$select_array,'sortCollumn'=>$sortCollumn,'sortOrder' => $sortOrder]);
    }

        

        


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create', ['categories' =>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;

        $post->title = $request->post_title;
        $post->description = $request->post_description;

        if($request->post_newcategory){
            $category = new Category;
            $category->title=$request->category_title;
            $category->description = $request->category_description;
            $category->save();

            $post->category_id = $category->id;

        } else {
            $post->category_id = $request->post_categoryid;
        }

        $post->save();

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show',['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

   
}

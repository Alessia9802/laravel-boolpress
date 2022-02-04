<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    //
    public function index()
    {

        # Senza la risorsa
        //$posts = Post::with(['tags'])->paginate();
        //return $posts;

        # Con la risorsa senza relazioni
        //return PostResource::collection(Post::all());

        # Con la risorsa e le relazioni
        //return PostResource::collection(Post::with(['category', 'tags'])->paginate());
        //return PostResource::collection(Post::with(['category'])->paginate(5));
        return PostResource::collection(Post::with(['category'])->orderByDesc('id')->paginate(5));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $thisPost = Post::where('id', $post->id)->with(['category'])->first();
        //ddd($thisPost);
        return new PostResource($thisPost);
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Post;
use App\Tag;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $posts = Post::all();

         $posts = Auth::user()->posts()->orderByDesc('id')->paginate(10);


        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validated = $request->validate([
            'title' => ['required', 'unique:posts', 'max:200'],
            'sub_title' => ['nullable'],
            'cover' => ['nullable'],
            'description' => ['nullable'],
            'category_id' => ['nullable', 'exists:categories,id'],
        ]);



        //ddd($validated);
        // Genera slug
        $validated['slug'] = Str::slug($validated['title']);

        //ddd($validated);
        $validated['user_id'] = Auth::id();
        // Salvataggio
        $post = Post::create($validated);
        if ($request->file('cover')) {
            $post->cover = Storage::put('posts', $request->file('cover'));
        }
        $post->save();
        if ($request->has('tags')) {
            $request->validate([
                'tags' => ['nullable', 'exists:tags,id']
            ]);
            $post->tags()->attach($request->tags);
        }
        // Redirect
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
         $categories = Category::all();
        $tags = Tag::all();

        if (Auth::id() === $post->user_id) {
            return view('admin.posts.edit', compact('post', 'categories', 'tags'));
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        if (Auth::id() === $post->user_id) {
            $validated = $request->validate([
                'title' => [
                    'required',
                    Rule::unique('posts')->ignore($post->id), 'max:200'
                ],
                'sub_title' => ['nullable'],
                'cover' => ['nullable'],
                'body' => ['nullable'],

            ]);

            // Genera slug
            $validated['slug'] = Str::slug($validated['title']);
            // Salvataggio
            $post->update($validated);
            if ($request->file('cover')) {
            Storage::delete($post->cover);
            $post->cover = Storage::put('post', $request->file('cover'));
        }

            if ($request->has('tags')) {
                $request->validate([
                    'tags' => ['nullable', 'exists:tags,id']
                ]);
                $post->tags()->sync($request->tags);
            }
            // Redirect
            return redirect()->route('admin.posts.index')->with('message', 'Post aggiornato con successo');
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return redirect()->route('admin.posts.index')->with('message', 'Hai rimosso il post definitivamente');
    }
}

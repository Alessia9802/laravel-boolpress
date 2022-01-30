<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;
use Illuminate\Support\Str;

class TagController extends Controller
{
     public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    //
    public function store(Request $request)
    {
        // validate data
        $validated_date = $request->validate([
            'name' => 'required|unique:tags'
        ]);
        $validated_date['slug'] = Str::slug($request->name);
        // save
        Tag::create($validated_date);

        // redirect back
        return redirect()->back()->with('message', '🥳 Tag created');
    }
}

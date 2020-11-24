<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::orderBy('updated_at', 'desc')->get();
        return view('admin.posts.index')->with(['data' => $data]);
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create')->with(['categories' => $categories, 'tags' => $tags]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['summary'] = Str::words($request->content, 50);
        $data['comments'] = 1;
        $data['featured'] = 0;
        $post = Post::create($data);

        $post->tags()->sync($request->tag_id, false);

        return redirect()->action([PostController::class, 'index']);
    }

    public function edit($id)
    {
        $item = Post::where('id', $id)->first();

        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit')->with([
            'item' => $item,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['summary'] = Str::words($request->content, 50);
        $data['comments'] = 1;
        $data['featured'] = 0;
        $post = Post::where("id",$id)->first();
        $post->update($data);

        $post->tags()->sync($request->tag_id, false);

        return redirect()->action([PostController::class, 'index']);
    }

    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $data = Post::where('title', 'like', "%" . $search . "%")
            ->orWhere('summary', 'like', '%' . $search . '%')
            ->paginate();

        return view('admin.posts.index')->with(['data' => $data]);
    }
}

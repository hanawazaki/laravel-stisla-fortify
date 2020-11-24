<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Str;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Tag::orderBy('updated_at','desc')->get();
        return view('admin.tags.index')->with(['data' => $data]);
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(TagRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        Tag::create($data);

        return redirect()->action([TagController::class,'index']);
    }

    public function show($id)
    {
        $data = Tag::where('id',$id)->first();

        return view('admin.tags.show')->with(['data'=> $data]);
    }

    public function edit($id)
    {
        $item = Tag::where('id',$id)->first();
        return view('admin.tags.edit')->with(['item'=>$item]);
    }

    public function update(TagRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $item = Tag::where('id',$id)->first();
        $item->update($data);

        return redirect()->route('tag.index');
    }

    public function destroy($id)
    {
        $item = Tag::where('id',$id)->first();
        $item->delete();

        return redirect()->route('tag.index');
    }

    public function search(Request $request){

        $search = $request->search;
        $data = Tag::where('name','like',"%".$search."%")
                        ->paginate();

        return view('admin.tags.index')->with(['data' => $data]);
    }
}

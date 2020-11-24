<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Category::orderBy('updated_at','desc')->get();
        return view('admin.categories.index')->with(['data' => $data]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);
        Category::create($data);

        return redirect()->action([CategoryController::class,'index']);
    }

    public function show($slug)
    {
        $data = Category::where('slug',$slug)->first();

        return view('admin.categories.show')->with(['data'=> $data]);
    }

    public function edit($slug)
    {
        $item = Category::where('slug',$slug)->first();
        return view('admin.categories.edit')->with(['item'=>$item]);
    }

    public function update(CategoryRequest $request, $slug)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $item = Category::where('slug',$slug)->first();
        $item->update($data);

        return redirect()->route('category.index');
    }

    public function destroy($slug)
    {
        $item = Category::where('slug',$slug)->first();
        $item->delete();

        return redirect()->route('category.index');
    }

    public function search(Request $request){

        $search = $request->search;
        $data = Category::where('name','like',"%".$search."%")
                        ->paginate();

        return view('admin.categories.index')->with(['data' => $data]);
    }
}

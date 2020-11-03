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
        $data = Category::orderBy('created_at','desc')->get();
        return view('admin.categories.index')->with(['data' => $data]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        Category::create($data);

        return redirect()->action([CategoryController::class,'index']);
    }

    public function show($slug)
    {
        $data = Category::where('slug',$slug)->first();

        return view('admin.categories.show')->with(['data'=> $data]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

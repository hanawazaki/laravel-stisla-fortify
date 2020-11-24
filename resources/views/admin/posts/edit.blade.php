@extends('layouts.backend')

@section('title', 'Post Edit')
@section('content')
    <div class="section-header">
        <h2>Ubah Post</h2>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('post.index') }}">Post</a></div>
            <div class="breadcrumb-item active">Ubah Post</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('post.update',$item->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="title">Judul Post</label>
                                <div class="input-group mb-2">
                                    <input type="text" value="{{ old('title') ? old('title') : $item->title }}" name="title" placeholder="isi judul"
                                        class="form-control @error('title') is-invalid @enderror">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="category">Kategori Post</label>
                                <div class="input-group mb-2">
                                    <select name="category_id"
                                        class="form-control @error('category_id') is-invalid @enderror" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $item->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tag">Tags</label>
                                <div class="input-group mb-2">
                                    <select name="tag_id[]"
                                        class="form-control select2-multi @error('tag_id') is-invalid @enderror"
                                        multiple="multiple">
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}" {{ $tag->id == $item->tag_id ? 'selected' : '' }}>{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('tag_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="content">Body</label>
                                <div class="input-group mb-2">
                                    <textarea name="content" 
                                              id="mytextarea"
                                              class="form-control @error('content') is-invalid @enderror"
                                                placeholder="isi deskripsi kategori">{{$item->content}}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

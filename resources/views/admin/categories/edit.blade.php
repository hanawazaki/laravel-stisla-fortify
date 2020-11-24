@extends('layouts.backend')

@section('title', 'Category Create')
@section('content')
    <div class="section-header">
        <h2>Ubah Kategori</h2>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('category.index') }}">Kategori</a></div>
            <div class="breadcrumb-item active">Ubah Kategori</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('category.update',$item->slug) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nama Kategori</label>
                                <div class="input-group mb-2">
                                    <input type="text" value="{{ old('name') ? old('name') : $item->name }}" name="name"
                                            placeholder="isi nama kategori"
                                            class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <div class="input-group mb-2">
                                    <textarea name="description" id="description" 
                                        class="form-control @error ('description') is-invalid @enderror"
                                        placeholder="isi deskripsi kategori">{{$item->description}}</textarea>
                                    @error('description')
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

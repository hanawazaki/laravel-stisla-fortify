@extends('layouts.backend')

@section('title', 'Category Create')
@section('content')
    <div class="section-header">
        <h1>Buat Kategori Baru</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('tag.index') }}">Tag</a></div>
            <div class="breadcrumb-item active">Tag Baru</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('tag.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Nama Tag</label>
                                <div class="input-group mb-2">
                                    <input type="text" 
                                           value="{{ old('title') }}" 
                                           name="title" 
                                           placeholder="isi nama tag"
                                           class="form-control @error('title') is-invalid @enderror">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="content">Deskripsi</label>
                                <div class="input-group mb-2">
                                    <textarea name="content" id="content" cols="30" rows="10" 
                                              class="form-control @error ('content') is-invalid @enderror"
                                              placeholder="isi deskripsi tag"></textarea>
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

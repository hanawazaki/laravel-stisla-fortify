@extends('layouts.backend')

@section('title', 'Tags Create')
@section('content')
    <div class="section-header">
        <h2>Ubah Kategori</h2>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('tag.index') }}">Tag</a></div>
            <div class="breadcrumb-item active">Ubah Tag</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('tag.update',$item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nama Tag</label>
                                <div class="input-group mb-2">
                                    <input type="text" value="{{ old('name') ? old('name') : $item->name }}" name="name"
                                            placeholder="isi nama tag"
                                            class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
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

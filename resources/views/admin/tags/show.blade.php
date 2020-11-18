@extends('layouts.backend')
@section('content')
    <div class="section-header">
        <h1>Detail Kategori</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('category.index') }}">Kategori</a></div>
            <div class="breadcrumb-item active">Lihat Kategori</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-lg-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <label for="">{{$data->title}}</label>
                        <br>
                        <label for="">{{$data->content}}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

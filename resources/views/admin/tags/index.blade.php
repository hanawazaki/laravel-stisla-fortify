@extends('layouts.backend')

@section('title', 'Post Lists')
@section('content')
    <div class="section-header">
        <h1>Tag List</h1>
        {{-- <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Category Lists</a></div>
        </div> --}}
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-header-form ">
                            <form method="GET" action="{{ URL::to('cari-tag') }}">
                                <div class="input-group ">
                                    <input type="text" class="form-control" placeholder="Search" name="search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-header-create ">
                            <a href="{{route('tag.create')}}" 
                               class="btn btn-primary">
                               Buat Baru
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Tag</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                                @forelse ($data as $item)
                                    <tr>
                                        <td class="p-0 text-center">{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td style="width: 450px">{!! $item->slug !!}</td>
                                        <td>
                                            <a href="{{ route('tag.edit',$item->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('tag.destroy', $item->id) }}" 
                                                  method="post" 
                                                  class="d-inline"
                                            >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center p-5">
                                           <i> Data Kosong</i>
                                        </td>
                                    </tr>
                                @endforelse

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
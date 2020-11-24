@extends('layouts.backend')

@section('title', 'Post Lists')
@section('content')
    <div class="section-header">
        <h1>Post List</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-header-form ">
                            <form method="GET" action="{{ URL::to('cari-post') }}">
                                <div class="input-group ">
                                    <input type="text" class="form-control" placeholder="Search" name="search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-header-create ">
                            <a href="{{route('post.create')}}" 
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
                                    <th>Judul Post</th>
                                    <th>Kategori</th>
                                    <th>Summary</th>
                                    <th>Status</th>
                                    <th>Featured</th>
                                    <th>Action</th>
                                </tr>
                                @forelse ($data as $item)
                                    <tr>
                                        <td class="p-0 text-center">{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->categories['name'] }}</td>
                                        <td style="width: 450px">{!! $item->summary !!}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->featured }}</td>
                                        {{-- <td>{{ $item->updated_at }}</td> --}}
                                        <td>
                                            <a href="{{ route('post.edit',$item->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('post.destroy', $item->id) }}" 
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
                                        <td colspan="6" class="text-center p-5">
                                            <i>Data Kosong</i>
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
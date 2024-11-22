@extends('layout')

@section('title', 'Danh sách')

@section('content')
    @session('message')
        <div class="alert alert-success text-center">
            {{ session('message') }}
        </div>
    @endsession
    <div>
        <a href="{{ route('create') }}" class="btn btn-success my-3">Create New +</a>
        <a href="{{ route('trash') }}" class="btn btn-warning" title="Trash"><i class="bi bi-trash-fill"></i></a>

        <table class="table table-bordered text-center table-hover">
            <thead class="table-danger">
                <th>ID</th>
                <th>Title</th>
                <th>Poster</th>
                <th>Intro</th>
                <th>Release_date</th>
                <th>Genre</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                    <tr>
                        <td>{{ $movie->id }}</td>
                        <td>{{ $movie->title }}</td>
                        <td>
                            <img src="{{Storage::url($movie->poster)}}" alt="Ảnh lỗi" width="100" style="object-fit: contain">
                        </td>
                        <td>{{ $movie->intro }}</td>
                        <td>{{ $movie->release_date }}</td>
                        <td>{{ $movie->genre->name }}</td>
                        <td class="d-flex">
                            <a href="{{ route('show', $movie->id) }}" class="btn btn-info" title="Detail"><i class="bi bi-eye-fill"></i></a>
                            <a href="{{ route('edit', $movie->id) }}" class="btn btn-warning mx-1" title="Edit"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('destroy', $movie->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" title="Delete" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                                    <i class="bi bi-x-circle-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $movies->links() }}
    </div>
@endsection

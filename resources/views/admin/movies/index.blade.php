@extends('admin.layouts.app')
@section('title', 'Danh sách phim')
@section('content')
<a href="{{ route('movies.create') }}" class="btn btn-success mb-3">Thêm phim mới</a>
<table class="table">
    <thead>
        <tr>
            <th>Tiêu đề</th>
            <th>Lượt xem</th>
            <th>Video</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($movies as $movie)
        <tr>
            <td>{{ $movie->title }}</td>
            <td>{{ $movie->views }}</td>
            <td>
            <video width="150" controls>
            <source src="{{ asset('storage/'.$movie->video_path) }}" type="video/mp4">
            </video>
            </td>
            <td>
                <a href="{{ route('movies.edit', $movie) }}" class="btn btn-primary btn-sm">Sửa</a>
                <form action="{{ route('movies.destroy', $movie) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa phim này?')">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

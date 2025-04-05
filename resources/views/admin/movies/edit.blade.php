@extends('admin.layouts.app')
@section('title', 'Sửa phim')
@section('content')
<form action="{{ route('movies.update', $movie) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Tiêu đề</label>
        <input type="text" name="title" class="form-control" value="{{ $movie->title }}" required>
    </div>
    <div class="mb-3">
        <label>Mô tả</label>
        <textarea name="description" class="form-control">{{ $movie->description }}</textarea>
    </div>
    <div class="mb-3">
        <label>Ảnh đại diện hiện tại</label><br>
        @if($movie->thumbnail)
            <img src="{{ asset('storage/'.$movie->thumbnail) }}" width="100">
        @endif
        <input type="file" name="thumbnail" class="form-control mt-2">
    </div>
    <div class="mb-3">
        <label>Video hiện tại</label><br>
        <video width="150" controls>
            <source src="{{ asset('storage/'.$movie->video_path) }}">
        </video>
        <input type="file" name="video" class="form-control mt-2">
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
@endsection

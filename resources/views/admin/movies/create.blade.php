@extends('admin.layouts.app')
@section('title', 'Thêm phim')
@section('content')
<form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Tiêu đề</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Mô tả</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label>Ảnh đại diện</label>
        <input type="file" name="thumbnail" class="form-control">
    </div>
    <div class="mb-3">
        <label>File video</label>
        <input type="file" name="video" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Lưu</button>
</form>
@endsection

@extends('admin.layouts.base')
@section('title', 'ImageEdit')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('image') }}">Daftar gambar</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Gambar</li>
        </ol>
    </nav>
    <div class="container">
        <h1>Edit Image</h1>
        <form action="{{ route('image.update', $image->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="resolusi">Orientation</label>
                <select name="resolusi" id="kategori" class="form-control" required>
                    <option value="" disabled {{ $image->resolusi == '' ? 'selected' : '' }}>Pilih Kategori</option>
                    <option value="Landscape" {{ $image->resolusi == 'Landscape' ? 'selected' : '' }}>Landscape</option>
                    <option value="Potrait" {{ $image->resolusi == 'Potrait' ? 'selected' : '' }}>Potrait</option>
                </select>
            </div>
            <div class="form-group">
                <label for="path">Image</label>
                <input type="file" name="path" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

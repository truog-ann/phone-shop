@extends('admin.layout')
@section('content')
    <div class="container my-4">
        <h2 class="text-center">{{$title}}</h2>
        <form action="{{ route('banners.update', ['banner' => $banner->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="" class="form-label">Tiêu đề banner</label>
                <input type="text" class="form-control" value="{{$banner->title_banner}}" name="title_banner" id=""
                    placeholder="" />
                @error('title_banner')
                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="d-flex justify-content-center my-2">
                <button type="submit" class="btn btn-primary " name="submit">Sửa tiêu đề banner</button>
            </div>
        </form>
    </div>
@endsection

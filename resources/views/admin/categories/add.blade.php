@extends('admin.layout')
@section('content')
    <div class="container my-4">
        <h2 class="text-center">{{$title}}</h2>
        <form action="/admin/categories" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Tên danh mục</label>
                <input type="text" class="form-control" name="name_cate" id="" placeholder="" />
                @error('name_cate')
                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                @enderror
                <div class="d-flex justify-content-center my-2">
                    <button type="submit" class="btn btn-primary " name="submit">Thêm danh mục</button>
                </div>
            </div>
        </form>
    </div>
@endsection

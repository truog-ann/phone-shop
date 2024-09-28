@extends('admin.layout')
@section('content')
    <div class="container my-4">
        <h2 class="text-center">{{$title}}</h2>
        <form action="/admin/promotions" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Tiêu đề khuyến mại</label>
                <input type="text" class="form-control" name="title_promotion" id="" placeholder="" />
                @error('title_promotion')
                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Ngày bắt đầu</label>
                <input type="date" class="form-control" name="start" id="" placeholder="" />
                @error('start')
                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Ngày kết thúc</label>
                <input type="date" class="form-control" name="end" id="" placeholder="" />
                @error('end')
                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="d-flex justify-content-center my-2">
                <button type="submit" class="btn btn-primary " name="submit">Thêm khuyến mại</button>
            </div>
        </form>
    </div>
@endsection

@extends('admin.layout')
@section('content')
    <div class="container my-4">
        <h2 class="text-center">{{ $title }}</h2>
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if (session()->has('file'))
                <script>
                    alert('{{ session()->get('file') }}');
                </script>
            @endif
            <div class="mb-3">
                <label for="" class="form-label">Tên sản phẩm</label>
                <input type="text" value="{{ old('name_product') }}" class="form-control" name="name_product"
                    id="" placeholder="" />
                @error('name_product')
                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Ảnh sản phẩm</label>
                <input type="file" class="form-control" name="file_upload" id="" placeholder="" />
                @error('file_upload')
                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Số lượng</label>
                <input type="number" value="0" class="form-control" name="quantity" id="" placeholder="" />
                @error('quantity')
                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Giá sản phẩm</label>
                <input type="number" class="form-control" value="{{ old('price') }}" name="price" id=""
                    placeholder="" />
                @error('price')
                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Giá khuyến mại</label>
                <input type="number" class="form-control" value="{{ old('price_promotion') }}" name="price_promotion"
                    id="" placeholder="" />
                @error('price_promotion')
                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Danh mục</label>
                <select name="cate_id" id="" class="form-control">
                    <option value="">- Chọn -</option>
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}"@if ($cate->id == old('cate_id')) selected @endif>
                            {{ $cate->name_cate }}</option>
                    @endforeach
                </select>
                @error('cate_id')
                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Khuyến mại</label>
                <select name="promotion_id" id="" class="form-control">
                    <option value="">- Chọn -</option>
                    @foreach ($promotions as $promotion)
                        <option value="{{ $promotion->id }}" @if ($promotion->id == old('promotion_id')) selected @endif>
                            {{ $promotion->title_promotion }}</option>
                    @endforeach
                </select>
                @error('promotion_id')
                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Mô tả</label>
                <textarea name="desc" class="form-control" id="" cols="10" rows="5">{{ old('desc') }}</textarea>
            </div>
            <div class="d-flex justify-content-center my-2">
                <button type="submit" class="btn btn-primary " name="submit">Thêm sản phẩm</button>
            </div>
        </form>
    </div>
@endsection

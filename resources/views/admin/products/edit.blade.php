@extends('admin.layout')
@section('content')
    <div class="container my-4">
        <h2 class="text-center">{{ $title }}</h2>
        <form action="{{ route('products.update', ['product' => $product->id]) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if (session()->has('file'))
                <script>
                    alert('{{ session()->get('file') }}');
                </script>
            @endif
            <div class="mb-3">
                <label for="" class="form-label">Tên sản phẩm</label>
                <input type="text" value="{{ $product->name_product }}" class="form-control" name="name_product"
                    id="" placeholder="" />
                @error('name_product')
                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Ảnh sản phẩm</label>
                <input type="file" value="{{ $product->img_prod }}" class="form-control" name="file_upload"
                    id="" placeholder="" />
                @error('file_upload')
                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Số lượng</label>
                <input type="number" value="{{ $product->quantity }}" class="form-control" name="quantity" id=""
                    placeholder="" />
                @error('quantity')
                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Giá sản phẩm</label>
                <input type="number" class="form-control" value="{{ $product->price }}" name="price" id=""
                    placeholder="" />
                @error('price')
                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Giá sản phẩm</label>
                <input type="number" class="form-control" value="{{ $product->price_promotion }}" name="price_promotion" id=""
                    placeholder="" />
                @error('price_promotion')
                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Danh mục</label>
                <select name="cate_id" id="" class="form-control">
                    <option value="">- Chọn -</option>
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}" @if ($cate->id == $product->cate_id) selected @endif>
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
                        <option value="{{ $promotion->id }}" @if ($promotion->id == $product->promotion_id) selected @endif>

                            {{ $promotion->title_promotion }}</option>
                    @endforeach
                </select>
                @error('promotion_id')
                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Mô tả</label>
                <textarea name="desc" class="form-control" id="" cols="10" rows="5">
                    {{ $product->desc }}
                </textarea>
            </div>
            <div class="d-flex justify-content-center my-2">
                <button type="submit" class="btn btn-primary " name="submit">Sửa sản phẩm</button>
            </div>
        </form>
    </div>
@endsection

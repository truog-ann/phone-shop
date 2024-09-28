@extends('admin.layout')
@section('content')
    <div class="container">
        <h2 class="text-center">{{ $title }}</h2>
        <a name="" id="" class="btn btn-primary" href="{{ route('products.index') }}" role="button">Quay lại</a>

        <div class="d-flex gap-10">
            <div>
                <img src="{{ asset('storage/img/' . $product->img_prod) }}" width="300" height="500" alt="">
            </div>
            <div class="ml-5">
                <h4>Tên sản phẩm: {{ $product->name_product }}</h4>
                <p>Số lượng: {{ $product->quantity }} </p>
                <p>Giá: {{ number_format($product->price,"0",".",".") }} VNĐ </p>
                <p>Danh mục: {{ $product->cates->name_cate }} </p>
                <p>Khuyến mại: {{ $product->promotions->title_promotion }} </p>
                <div>
                    Mô tả:
                    <p>{{ $product->desc }}</p>
                </div>
            </div>
        </div>

    </div>
@endsection

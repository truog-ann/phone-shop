@extends('admin.layout')
@section('content')
    <div class="">
        <h2 class="text-center my-2">{{ $title }}</h2>
        <a name="" id="" class="btn btn-success my-2" href="{{ route('products.create') }}" role="button">Thêm
            sản phẩm</a>
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Giá khuyến mại</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Hoạt động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $data)
                        <tr class="">
                            <td scope="row">{{ $data->id }}</td>
                            <td>{{ $data->name_product }}</td>
                            <td><img width="100" height="100" src="{{ asset('storage/img/' . $data->img_prod) }}"
                                    alt=""></td>
                            <td>{{ number_format($data->price, '0', '.', '.') }} VND</td>
                            <td>{{ number_format($data->price_promotion, '0', '.', '.') }} VND</td>
                            <td>{{ $data->quantity }} </td>
                            <td>{{ $data->cates->name_cate }} </td>

                            <td class="d-flex">
                                <a name="" id="" class="btn btn-primary mx-2"
                                    href="{{ route('products.show', ['product' => $data->id]) }}" role="button">Chi
                                    tiết</a>
                                <form action="{{ route('products.destroy', ['product' => $data->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chán muốn xóa')">
                                        Xóa
                                    </button>

                                </form>
                                <a name="" id="" class="btn btn-warning mx-2"
                                    href="{{ route('products.edit', ['product' => $data->id]) }}" role="button">Sửa</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div>
                {{ $products->links() }}
            </div>
        </div>

    </div>
@endsection

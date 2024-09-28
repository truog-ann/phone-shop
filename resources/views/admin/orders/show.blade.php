@extends('admin.layout')
@section('content')
    <div class="">
        <h2 class="text-center my-2">{{ $title }}: {{ $id }}</h2>
        <div class="table-responsive">
            <a class="btn btn-primary" href="{{ route('order.print', ['id' => $id]) }}">
                In hóa đơn
            </a>



            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $data)
                        <tr class="">
                            <td scope="row">{{ $data->name_product }}</td>
                            <td>{{ $data->name_cate }}</td>
                            <td>
                                <img width="100" height="100" src="{{ asset('storage/img/' . $data->img) }}"
                                    alt="">
                            </td>
                            <td>{{ number_format($data->price, '0', '.', '.') }} VND</td>
                            <td>{{ $data->quantity }} </td>
                            <td>{{ number_format($data->total, '0', '.', '.') }} VND</td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div>
                {{ $orders->links() }}
            </div>
        </div>

    </div>
@endsection

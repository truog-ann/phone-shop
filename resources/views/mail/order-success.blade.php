@extends('mail.layout')
@section('content')
    <div class="container">
        <h2 align="center">Cảm ơn bạn đã đặt hàng của tôi.</h2>
        <p>Thông tin đơn hàng</p>
        <div>
            <p>Tên người nhận: {{ $order->name }}</p>
            <p>Email: {{ $order->email }}</p>
            <p>Số điện thoại: {{ $order->phone }}</p>
            <p>Địa chỉ giao hàng: {{ $order->address }}</p>
            <p>Ngày đặt hàng: {{ $order->date_order }}</p>
            <p>Trạng thái: {{ $order->status }}</p>
            <p>Tình trạng: {{ $order->paid = 0 ? 'Chưa thanh toán' : 'Đã thanh toán' }}</p>
        </div>
        <div>
            <p>Chi tiết đơn hàng</p>
            <div class="table-responsive">
                <table class="table table-primary" border="1" cellspacing='0' cellspacing='10' style="width: 100%;">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tổng</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($orders as $item => $value)
                            <tr class="">
                                <td scope="row">{{ ++$item }}</td>
                                <td scope="">{{ $value->name_product }}</td>
                                <td>{{ $value->name_cate }}</td>
                                <td>{{ number_format($value->price, '0', '.', '.') }} VND</td>
                                <td>{{ $value->quantity }} </td>
                                <td>{{ number_format($value->total, '0', '.', '.') }} VND</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection

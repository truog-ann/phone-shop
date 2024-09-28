@extends('admin.layout')
@section('content')
    <div class="">
        <h2 class="text-center my-2">{{ $title }}</h2>
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Tên người nhận</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Tổng</th>
                        <th scope="col">Ngày đặt hàng</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Tình trạng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $data)
                        <tr class="">
                            <td scope="row">{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->phone }}</td>
                            <td>{{ $data->address }}</td>
                            <td>{{ number_format($data->total, '0', '.', '.') }} VND</td>
                            <td>{{ $data->date_order }} </td>
                            <td>{{ $data->status }} </td>
                            <td>{{ $data->paid = 0 ? 'Chưa thanh toán' : 'Đã thanh toán' }} </td>
                            <td class="">
                                @if ($data->status !== 'Chờ xác nhận' && $data->status !== 'Hoàn thành')
                                    <a name="" id="" class="btn btn-warning mx-2"
                                        href="{{ route('orders.edit', ['order' => $data->id]) }}" role="button">Cập
                                        nhật</a>
                                @elseif($data->status == 'Chờ xác nhận')
                                    <form action="{{ route('orders.success', ['id' => $data->id]) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <input type="submit" class="btn btn-success" value="Xác nhận" name="status">
                                    </form>
                                @endif
                                <a name="" id="" class="btn btn-primary mx-2"
                                    href="{{ route('orders.show', ['order' => $data->id]) }}" role="button">Chi
                                    tiết</a>
                            </td>
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

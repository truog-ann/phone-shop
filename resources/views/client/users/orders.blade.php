@extends('client.layout')
@section('content')
    <main>
        <div class="my_account">
            <div class="category_account">
                <ul class="li"><a href="{{ route('profiles', ['email' => Auth::user()->email]) }}">Thông tin tài khoản</a>
                </ul>
                <ul class="li"><a href="{{ route('pass.user') }}">Đổi Mật Khẩu</a></ul>
                <ul class="li"><a href="{{ route('user.order') }}">Đơn hàng</a></ul>
            </div>
            <div class="content_account">
                <h3>Đơn hàng</h3>
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">Người nhận</th>

                                <th scope="col">Tổng đơn hàng</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Tình trạng</th>
                                <th scope="col">Xem</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $data)
                                <tr class="">
                                    <td scope="row">{{ $data->name }}</td>
                                    <td>{{ number_format($data->total, '0', '.', '.') }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>
                                        {{ $data->paid = 0 ? 'Chưa thanh toán' : 'Đã thanh toán' }}
                                    </td>
                                    <td>
                                        <a name="" id="" class="btn btn-primary"
                                            href="{{ route('user.order.detail', ['id' => $data->id]) }}" role="button">Chi
                                            tiết</a>
                                        @if ($data->status !== 'Hoàn thành')
                                            <form action="{{ route('user.order.del', ['id' => $data->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" id="" class="btn btn-danger"
                                                    onclick="return confirm('Bạn có muốn hủy đơn hàng')" role="button">Hủy
                                                </button>
                                            </form>
                                        @endif

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
        </div>
        </div>
    </main>
@endsection

@extends('client.layout')
@section('content')
    <div class="container mt-4 mb-4">
        <div class="row d-flex cart align-items-center justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="text-center order-details p-5">
                        <div class="d-flex justify-content-center mb-5 flex-column align-items-center">
                            <span class="check1 p-4 rounded-circle bg-success my-2" style="width: 80px;"><i
                                    class="fa fa-check text-white fs-4"></i></span>
                            <span class="font-weight-bold">Đặt hàng thành công</span>
                            <small class="mt-2">Đơn hàng sẽ sớm được vận chuyển đến
                                với bạn.</small>
                                <p>Hóa đơn đã được gửi đến email của bạn.</p>
                        </div>
                        <a href="{{ route('user.order') }}">
                            <button class="btn btn-danger btn-block order-button">
                                Xem đơn hàng
                            </button></a>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

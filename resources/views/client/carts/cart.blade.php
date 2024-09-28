@extends('client.layout')
@section('content')
    <main>
        <section class="h-100" style="background-color: #a7a2a2;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col ">
                        <p class="py-3 my-5">
                            <span class="h2">Giỏ hàng
                            </span>
                        </p>
                        @if (!session('cart'))
                            <div class="text-center">
                                <h3>
                                    Giỏ hàng của bạn đang trống!!!
                                </h3>
                                <h2 class="fw-bold">Hãy thêm sản phẩm vào giỏ hàng.</h2>
                            </div>
                        @else
                            <div class="card mb-4">
                                @foreach ($cart->list() as $item)
                                    <div class="card-body p-4">
                                        <div class="row align-items-center">
                                            <div class="col-md-2">
                                                <img src="{{ asset('storage/img/' . $item['image']) }}" class="img-fluid"
                                                    alt="Generic placeholder image">
                                            </div>
                                            <div class="col-md-2 d-flex justify-content-center">
                                                <div>
                                                    <p class="small text-muted mb-4 pb-2">Tên</p>
                                                    <p class="lead fw-normal mb-0">{{ $item['name'] }}</p>
                                                </div>
                                            </div>

                                            <div class="col-md-2 d-flex justify-content-center">
                                                <div>
                                                    <p class="small text-muted mb-4 pb-2">Số
                                                        lượng</p>
                                                    <div class="d-flex">


                                                        <a href="{{ route('cart.minus', ['id' => $item['product_id']]) }}">
                                                            <button class="btn btn-link px-2" name="giam" value="0">
                                                                <i class="fas fa-minus"></i>
                                                            </button>
                                                        </a>
                                                        <input id="{{ $item['product_id'] }}" min="1"
                                                            value="{{ $item['quantity'] }}" name="quantity" type="number"
                                                            class="form-control form-control-sm" />
                                                        <a href="{{ route('cart.plus', ['id' => $item['product_id']]) }}">

                                                            <button class="btn btn-link px-2">
                                                                <i class="fas fa-plus"></i>
                                                            </button>
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-2 d-flex justify-content-center">
                                                <div>
                                                    <p class="small text-muted mb-4 pb-2">Giá</p>
                                                    <p class="lead  mb-0">
                                                        {{ number_format($item['price'], '0', '.', '.') }} VND

                                                        VNĐ</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2 d-flex justify-content-center">
                                                <div>
                                                    <p class="small text-muted mb-4 pb-2">Tổng</p>
                                                    <p class="lead  mb-0">
                                                        {{ number_format($item['price'] * $item['quantity'], '0', '.', '.') }}
                                                        VNĐ</p>
                                                </div>
                                            </div>
                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                <form action="{{ route('cart.remove', ['id' => $item['product_id']]) }}"
                                                    method="post">
                                                    @csrf
                                                    <button class="border-0 bg-white"
                                                        onclick="return confirm('Bạn có muốn xóa sản phẩm khỏi giỏ hàng?')"
                                                        type="submit">
                                                        <i class="fas fa-trash fa-lg"></i>
                                                    </button>
                                                </form>


                                            </div>
                                        </div>

                                    </div>
                                @endforeach

                            </div>
                            <div class="card mb-5">
                                <div class="card-body p-4">

                                    <div class="float-end">
                                        <p class="mb-0 me-5 d-flex align-items-center">
                                            <span class="small text-muted me-2">Tổng
                                                hóa
                                                đơn: </span> <span class="lead fw-normal">
                                                {{ number_format($cart->totalPrice(), '0', '.', '.') }}
                                                VNĐ</span>
                                        </p>
                                    </div>

                                </div>
                            </div>

                            <div class=" mb-5 d-flex justify-content-end">
                                <form action="{{ route('cart.clear') }}" method="post">
                                    @csrf
                                    <button type="submit"
                                        onclick="return confirm('Bạn có muốn xóa toàn bộ giỏ hàng?')"
                                        class="btn btn-light btn-lg me-2">Xóa toàn bộ
                                        sản
                                        phẩm</button>
                                </form>

                                <a href="{{ route('home') }}">
                                    <button type="button" class="btn btn-light btn-lg me-2">Tiếp tục
                                        mua
                                        sắm</button>
                                </a>

                                <a href="{{ route('checkout') }}">
                                    <button type="button" class="btn btn-primary btn-lg">Mua
                                        hàng</button>
                                </a>
                            </div>

                    </div>
                    @endif
                </div>
            </div>
        </section>
    </main>
@endsection

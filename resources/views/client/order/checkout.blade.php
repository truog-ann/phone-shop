@extends('client.layout')
@section('content')
    <main class>
        <div class=" container-fluid my-5 ">
            <div class="row justify-content-center ">
                <div class="col-xl-10">
                    <div class="card shadow-lg ">
                        <div class="row justify-content-around mt-5">

                            <div class="col-md-5">
                                <div class="card border-0">
                                    <div class="card-header pb-0">
                                        <h2 class="card-title space ">Thanh toán</h2>
                                        <hr class="my-0">
                                    </div>
                                    <div class="card-body">
                                        <div class="row mt-4">
                                            <div class="col">
                                                <p class="text-muted mb-2">Thông
                                                    tin
                                                    người nhận</p>
                                                <hr class="mt-0">
                                            </div>
                                        </div>
                                        <form action="{{ route('order.add') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="NAME" class="small text-muted mb-1">Tên
                                                    người nhận</label>
                                                <input type="text" value="{{Auth::user()->name_user }}"
                                                    class="form-control form-control-sm" name="name" id="NAME"
                                                    aria-describedby="helpId">
                                                @error('name')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="NAME" class="small text-muted mb-1">Email</label>
                                                <input type="text" value="{{Auth::user()->email}}"
                                                    class="form-control form-control-sm" name="email" id="NAME"
                                                    aria-describedby="helpId" placeholder=>
                                                @error('email')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group" style="margin-top: 20px;">
                                                <label for="NAME" class="small text-muted mb-1">Số
                                                    diện thoại</label>
                                                <input type="text" class="form-control form-control-sm" name="phone"
                                                    value="{{Auth::user()->phone }}" id="NAME" aria-describedby="helpId"
                                                    placeholder="0123456789">

                                                @error('phone')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group" style="margin-top: 20px;">
                                                <label for="NAME" class="small text-muted mb-1">Địa
                                                    chỉ nhận hàng</label>
                                                <textarea name='address' class="form-control form-control-sm" id cols="30" rows="2">{{Auth::user()->address }}</textarea>
                                                @error('address')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>


                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="card border-0 ">
                                    <div class="card-header card-2">
                                        <p class="card-text text-muted mt-md-4  mb-2 space">ĐƠN
                                            HÀNG CỦA BẠN
                                        </p>
                                        <hr class="my-2">
                                    </div>
                                    <div class="card-body pt-20">
                                        @foreach ($cart->list() as $item)
                                            <div class="row  justify-content-between">
                                                <div class="col-auto col-md-6">
                                                    <div class="media flex-column flex-sm-row">
                                                        <img class=" img-fluid"
                                                            src="{{ asset('storage/img/' . $item['image']) }}"
                                                            width="80" height="80">
                                                        <div class="media-body  my-auto">
                                                            <div class="row ">
                                                                <div class="col-auto">
                                                                    <p class="mb-0">
                                                                        <b>{{ $item['name'] }}</b>
                                                                    </p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" pl-0 flex-sm-col col-auto  my-auto">
                                                    <p>Số lượng</p>
                                                    <p class="boxed-1">{{ $item['quantity'] }}</p>
                                                </div>
                                                <div class=" pl-0 flex-sm-col col-auto  my-auto ">
                                                    <p>Thành tiền</p>
                                                    <p>
                                                        <b>{{ number_format($item['price'], '0', '.', '.') }}VNĐ
                                                        </b>
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                        <hr class="my-2">
                                        <div class="row ">
                                            <div class="col">
                                                <div class="row justify-content-between">
                                                    <div class="col-4">
                                                        <p class="mb-1">
                                                            <b>Thành tiền</b>
                                                        </p>
                                                    </div>
                                                    <div class="flex-sm-col col-auto">
                                                        <p class="mb-1">
                                                            <b>{{ number_format($cart->totalPrice(), '0', '.', '.') }}VNĐ</b>
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="row justify-content-between">
                                                    <div class="col-4">
                                                        <p>
                                                            <b>Tổng</b>
                                                        </p>
                                                    </div>
                                                    <div class="flex-sm-col col-auto">
                                                        <p class="mb-1">
                                                            <b>{{ number_format($cart->totalPrice(), '0', '.', '.') }}VNĐ</b>
                                                        </p>
                                                    </div>
                                                </div>
                                                <hr class="my-0">
                                            </div>
                                        </div>
                                        <div class="row mb-5 mt-4 ">
                                            <div class="">
                                                <a name="{{ route('order.clear') }}" id="" class="btn btn-danger"
                                                    href="#" role="button">Hủy đơn hàng</a>
                                                <input type="text" hidden name="paid" value="0">

                                                <input type="submit" name="method_payment" class="btn btn-primary"
                                                    value="Thanh toán khi nhận hàng">
                                                </form>
                                                <form action="{{ route('payment') }} " method="post">
                                                    @csrf
                                                    <input type="text" hidden value="{{Auth::user()->name_user }}"
                                                        class="form-control form-control-sm" name="name"
                                                        id="NAME" aria-describedby="helpId">
                                                    <input type="text" hidden value="{{Auth::user()->email }}"
                                                        class="form-control form-control-sm" name="email"
                                                        id="NAME" aria-describedby="helpId" placeholder=>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="phone" hidden value="{{Auth::user()->phone }}" id="NAME"
                                                        aria-describedby="helpId" placeholder="0123456789">
                                                    <textarea name='address' hidden class="form-control form-control-sm" id cols="30" rows="2">{{Auth::user()->address }}</textarea>

                                                    <input type="text" hidden name="paid" value="1">
                                                    <input type="text" hidden name="total_price"
                                                        value="{{ $cart->totalPrice() }}">
                                                    <input type="submit" name="method_payment" class="btn btn-warning"
                                                        value="Thanh toán với vnpay">
                                                </form>






                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

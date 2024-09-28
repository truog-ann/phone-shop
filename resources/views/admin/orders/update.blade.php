@extends('admin.layout')
@section('content')
    <div class="container my-4">
        <h2 class="text-center">{{ $title }}</h2>
        <form action="{{ route('orders.update', ['order' => $order->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="" class="form-label">Trạng thái đơn hàng</label>
                <select name="status" class="form-control" id="">
                    <option value="Chờ xác nhận" {{ $order->status == 'Chờ xác nhận' ? 'selected' : '' }}>Chờ xử lý</option>
                    <option value="Đã xác nhận" {{ $order->status == 'Đã xác nhận' ? 'selected' : '' }}>Đã xác nhận</option>
                    <option value="Đang giao hàng" {{ $order->status == 'Đang giao hàng' ? 'selected' : '' }}>Đang giao hàng
                    </option>
                    <option value="Hoàn thành" {{ $order->status == 'Hoàn thành' ? 'selected' : '' }}>Hoàn thành</option>
                </select>
                @error('title_banner')
                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="d-flex justify-content-center my-2">
                <button type="submit" class="btn btn-primary " name="submit">Cập nhật</button>
            </div>
        </form>
    </div>
@endsection

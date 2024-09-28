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
                <form action="{{ route('update.user') }}" method="post" class="form_sign_up">
                    @csrf
                    @method('patch')
                    <div class="items_sign_up">
                        <div class="input-group">
                            <label class="">Họ tên</label>

                            <input type="text" value="{{ $user->name_user }}" name="name_user" class="input-items">
                            @error('name_user')
                                <span class="text-danger ">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <label class="">Email</label>
                            <input type="text" value="{{ $user->email }}" disabled name="email"
                                class="input-items disabled">

                        </div>
                    </div>
                    <div class="items_sign_up">
                        <div class="input-group">
                            <input type="text" value="{{ $user->phone }}" name="phone" autocomplete="off"
                                class="input-items">
                            <label class="user-label">Số điện thoại</label>
                            @error('phone')
                                <span class="text-danger ">*{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="input-group">
                        <input required="" type="text" value="{{ $user->address }}" name="address" autocomplete="off"
                            class="input-items" style="width: 690px; margin-top: 0;" value=" ">
                        <label class="user-label">Địa Chỉ</label>
                    </div>

                    <div class="account_sign">
                        <button class="btn btn-primary">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </main>
@endsection

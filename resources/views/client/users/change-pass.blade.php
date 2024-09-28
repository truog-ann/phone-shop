@extends('client.layout')
@section('content')
    <main>
        <div class="my_account">
            <div class="category_account">
                <ul class="li"><a href="{{ route('profiles', ['email' => Auth::user()->email]) }}">Thông tin tài khoản</a>
                </ul>
                <ul class="li"><a href="{{ route('pass.user')}}">Đổi Mật Khẩu</a></ul>
                <ul class="li"><a href="{{ route('user.order') }}">Đơn hàng</a></ul>
            </div>
            <div class="content_account">
                <form action="{{ route('change.pass.user') }}" method="post" class="form_sign_up">
                    @csrf
                    @method('patch')
                    <div class="items_sign_up">
                        <div class="input-group">
                            <input type="password" value="" name="old_pass" autocomplete="off"
                                class="input-items">
                            <label class="user-label">Mật khẩu cũ</label>
                            @error('pass_original')
                                <span class="text-danger ">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <input type="password" value="" name="new_pass" autocomplete="off" class="input-items">
                            <label class="user-label">Mật khẩu mới</label>
                            @error('new_pass')
                                <span class="text-danger ">*{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="account_sign">
                        <button class="btn btn-primary">Đổi mật khẩu</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </main>
@endsection

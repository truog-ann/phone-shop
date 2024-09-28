@extends('mail.layout')
@section('content')
    <div class="container" style="text-align: center">
        <h2>Tôi đã nhận được yêu cầu đặt lại mật khẩu</h2>
        <div>
            <p>Mật khẩu sẽ được đặt lại là: 123456789</p>
            <p>Xác nhận thông qua đường dẫn bên dười để đặt lại mật khẩu</p>
            <button>
                <a href="http://127.0.0.1:8000/users/repass-success/{{ $token }}">
                    Xác nhận
                </a>
            </button>
        </div>
    </div>
@endsection

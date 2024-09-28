@extends('client.layout')
@section('content')
    <main>
        <div class="sign_in">
            <div class="sign-items">
                <div class="sign-title">
                    <h2>
                        Đăng Nhập
                    </h2>
                </div>
                <div class="strikethrough"></div>

                <form action="{{ route('dologin') }}" method="post" class="sign_form">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="email" autocomplete="off" class="input-items">
                        <label class="user-label">Email</label>
                        @error('email')
                            <span class="text-danger ">*{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="input-group" style="margin-bottom: 0;">
                        <input type="password" name="password" autocomplete="off" class="input-items" id="show_pass">
                        <label class="user-label">Pass Word</label>
                        @error('password')
                            <span class="text-danger ">*{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="forgot">
                        <div class="show">
                            <input type="checkbox" onclick="ShowPassword()"> Show Pass Word
                        </div>

                        <div class="forgot_items">
                            <a href="{{ route('reset_pass') }}">
                                <p>Quên Mật Khẩu</p>
                            </a>
                        </div>

                    </div>

                    <div class="account_sign">
                        <a href="" class="sign_in">
                            <input type="submit" value="Đăng Nhập" name="signin">
                        </a>
                        <a href="{{ route('register') }}" class="sign_up">
                            <input type="button" value="Tạo Tài Khoản Mới">
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <script>
            function ShowPassword() {
                let show = document.getElementById("show_pass");
                if (show.type == "password") {
                    show.type = "text";
                } else {
                    show.type = "password";
                }
            }
        </script>
    </main>
@endsection

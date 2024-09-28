@extends('client.layout')
@section('content')
    <main>
        <div class="sign_in">
            <div class="sign-items">
                <div class="sign-title">
                    <h2>
                        Nhập email của bạn
                    </h2>
                </div>
                <div class="strikethrough"></div>

                <form action="{{ route('reset_pass') }}" method="post" class="sign_form">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="email" autocomplete="off" class="input-items">
                        <label class="user-label">Email</label>
                        @error('email')
                            <span class="text-danger ">*{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="account_sign">
                        <a href="" class="sign_in">
                            <input type="submit" value="Xác nhận" name="signin">
                        </a>

                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection

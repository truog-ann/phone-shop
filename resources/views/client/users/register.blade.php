@extends('client.layout')
@section('content')
    <main>
        <style>
            .pass_show {
                position: relative
            }

            .pass_show .ptxt {

                position: absolute;

                top: 50%;

                right: 10px;

                z-index: 1;

                color: #f36c01;

                margin-top: -10px;

                cursor: pointer;

                transition: .3s ease all;

            }

            .pass_show .ptxt:hover {
                color: #333333;
            }
        </style>
        <div class="page_sign_up">
            <div class="sign_up">
                <div class="sign-title">
                    <h2>
                        Đăng Ký
                    </h2>
                </div>
                <form action=" {{ route('doregister') }} " method="post" class="form_sign_up">
                    @csrf
                    <div class="items_sign_up">
                        <div class="input-group">
                            <input type="text" value="{{old('name_user')}}" name="name_user" class="input-items" style="height: 50px;">
                            <label class="user-label">Họ tên</label>
                            @error('name_user')
                                <span class="text-danger ">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <input type="text" value="{{old('email')}}" name="email" class="input-items" style="height: 50px;">
                            <label class="user-label">Email</label>
                            @error('email')
                                <span class="text-danger ">*{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="items_sign_up">
                        <div class="input-group">
                            <div class="form-group pass_show">
                                <input type="password" id="pass" name="pass_original" class="input-items "
                                    style="height: 50px;">
                                <label class="user-label">Mật khẩu</label>
                                <span>
                                    <i class="fa-solid fa-eye ptxt" onclick="ShowPassword()"></i>

                                </span>
                            </div>
                            @error('pass_original')
                                <span class="text-danger ">*{{ $message }}</span>
                            @enderror
                            <script>
                                function ShowPassword() {
                                    let show = document.getElementById("pass");
                                    if (show.type == "password") {
                                        show.type = "text";
                                    } else {
                                        show.type = "password";
                                    }
                                }
                            </script>
                        </div>
                        <div class="input-group">
                            <input type="text" name="phone" value="{{old('phone')}}"  class="input-items" style="height: 50px;">
                            <label class="user-label">Số điện thoại</label>
                            @error('phone')
                                <span class="text-danger ">*{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="input-group" style="margin-top: 20px;">
                        <input type="text" name="address" class="input-items" value="{{old('address')}}" 
                            style="width: 690px; margin-top: 0;height: 50px;">
                        <label class="user-label">Địa Chỉ</label>
                    </div>
                    <input type="text" name="role_id" value='3' hidden />
                    <div class="account_sign d-flex justify-content-center">
                        <input type="submit" class="btn btn-primary" value="Đăng Ký" name="add_tk">
                    </div>
                </form>
            </div>
        </div>
        <div>


    </main>
@endsection

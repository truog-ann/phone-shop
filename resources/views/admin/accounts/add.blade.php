@extends('admin.layout')
@section('content')
    <div class="container my-4">
        <h2 class="text-center">{{ $title }}</h2>
        <form action="{{ route('accounts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Tên người dùng</label>
                <input type="text" value="{{ old('name_user') }}" class="form-control" name="name_user" id=""
                    placeholder="" />
                @error('name_user')
                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="text" value="{{ old('email') }}" class="form-control" name="email" id="" placeholder="" />
                @error('email')
                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" value="{{ old('pasword') }}" name="pass_original" id=""
                    placeholder="" />
                @error('pass_original')
                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Vai trò</label>
                <select name="role_id" id="" class="form-control">
                    <option value="">- Chọn -</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}"@if ($role->id == old('role_id')) selected @endif>
                            {{ $role->role }}</option>
                    @endforeach
                </select>
                @error('role_id')
                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" value="{{ old('phone') }}" name="phone" id=""
                placeholder="" />
                @error('phone')
                <p class="text-danger font-weight-bold">{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" value="{{ old('addresss') }}" name="addresss" id=""
                placeholder="" />
            </div>
            <div class="d-flex justify-content-center my-2">
                <button type="submit" class="btn btn-primary " name="submit">Thêm tài khoản</button>
            </div>
        </form>
    </div>
@endsection

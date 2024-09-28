@extends('admin.layout')
@section('content')
    <div class="container my-4">
        <h2 class="text-center">{{ $title }}</h2>
        <form action="{{ route('accounts.update', ['account' => $account->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="" class="form-label">Tên người dùng</label>
                <input type="text" disabled value="{{ $account->name_user }}" name="name_user" class="form-control"
                    id="" placeholder="" />
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="text" disabled value="{{ $account->email }}" name="email" class="form-control"
                    id="" placeholder="" />
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Vai trò</label>
                <select name="role_id" id="" class="form-control">
                    <option value="">- Chọn -</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}"@if ($role->id == $account->role_id) selected @endif>
                            {{ $role->role }}</option>
                    @endforeach
                </select>
                @error('role_id')
                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="d-flex justify-content-center my-2">
                <button type="submit" class="btn btn-primary " name="submit">Cập nhật</button>
            </div>
        </form>
    </div>
@endsection

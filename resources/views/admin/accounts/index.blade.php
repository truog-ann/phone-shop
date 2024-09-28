@extends('admin.layout')
@section('content')
    <div class="">
        <h2 class="text-center my-2">{{ $title }}</h2>
        <a name="" id="" class="btn btn-success my-2" href="{{ route('accounts.create') }}" role="button">Thêm
            tài khoản</a>
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên </th>
                        <th scope="col">Email</th>
                        <th scope="col">Vai trò</th>
                        <th scope="col">Hoạt động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accounts as $data)
                        <tr class="">
                            <td scope="row">{{ $data->id }}</td>
                            <td>{{ $data->name_user }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->roles->role }} </td>
                            <td class="d-flex">
                                <a name="" id="" class="btn btn-warning mx-2"
                                    href="{{ route('accounts.edit', ['account' => $data->id]) }}" role="button">Phân
                                    quyền</a>
                                <form action="{{ route('accounts.destroy', ['account' => $data->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chán muốn xóa')">
                                        Xóa
                                    </button>

                                </form>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection

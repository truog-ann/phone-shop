@extends('admin.layout')
@section('content')
    <div class="">
        <h2 class="text-center my-2">{{ $title }}c</h2>
        <a name="" id="" class="btn btn-success my-2" href="categories/create" role="button">Thêm danh mục</a>
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Hoạt động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $data)
                        <tr class="">
                            <td scope="row">{{ $data->id }}</td>
                            <td>{{ $data->name_cate }}</td>
                            <td class="d-flex">
                                <form action="categories/{{ $data->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chán muốn xóa')">
                                        Xóa
                                    </button>

                                </form>
                                <a name="" id="" class="btn btn-warning mx-2"
                                    href="categories/{{ $data->id }}/edit" role="button">Sửa</a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>



    </div>
@endsection

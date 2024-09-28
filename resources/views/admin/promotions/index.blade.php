@extends('admin.layout')
@section('content')
    <div class="">
        <h2 class="text-center my-2">{{ $title }}</h2>
        <a name="" id="" class="btn btn-success my-2" href="promotions/create" role="button">Thêm khuyến mại</a>
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Thời gian bắt đầu</th>
                        <th scope="col">Thời gian kết thúc</th>
                        <th scope="col">Hoạt động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($promotions as $data)
                        <tr class="">
                            <td scope="row">{{ $data->id }}</td>
                            <td>{{ $data->title_promotion }}</td>
                            <td>{{ $data->start }}</td>
                            <td>{{ $data->end }}</td>
                            <td class="d-flex">
                                <form action="promotions/{{ $data->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chán muốn xóa')">
                                        Xóa
                                    </button>

                                </form>
                                <a name="" id="" class="btn btn-warning mx-2"
                                    href="promotions/{{ $data->id }}/edit" role="button">Sửa</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>



    </div>
@endsection

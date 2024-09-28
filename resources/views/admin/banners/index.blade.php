@extends('admin.layout')
@section('content')
    <div class="">
        <h2 class="text-center my-2">{{ $title }}</h2>
        <a name="" id="" class="btn btn-success my-2" href="{{ route('banners.create') }}" role="button">Thêm
            banner</a>
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Link ảnh</th>
                        <th scope="col">Hoạt động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banners as $data)
                        <tr class="">
                            <td scope="row">{{ $data->id }}</td>
                            <td>{{ $data->title_banner }}</td>
                            <td><a name="" id="" class="btn btn-primary"
                                    href="{{ route('banners.show', ['banner' => $data->id]) }}" role="button">Xem ảnh</a>
                            </td>
                            <td class="d-flex">
                                <form action="{{ route('banners.destroy', ['banner' => $data->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chán muốn xóa')">
                                        Xóa
                                    </button>

                                </form>

                                <a name="" id="" class="btn btn-warning mx-2"
                                    href="{{ route('banners.edit', ['banner' => $data->id]) }}" role="button">Sửa</a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>


    </div>
@endsection

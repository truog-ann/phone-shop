@extends('admin.layout')
@section('content')
    <div class="container">
        <h2 class="my-4 text-center">Banner Marketing: {{ $title_banner }}</h2>
        <a name="" id="" class="btn btn-primary my-2" href="{{ route('banners.index') }}" role="button">Quay
            lại</a>
        <a name="" id="" class="btn btn-primary my-2" href="{{ route('add_image', ['id' => $banner_id]) }}"
            role="button">Thêm
            banner</a>

        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Banner</th>
                        <th scope="col">Hoạt động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banners as $img)
                        <tr class="">
                            <td scope="row">{{ $img->id }}</td>
                            <td> <img width="700" height="300" src="{{ asset('storage/banners/' . $img->img_banner) }}"
                                    alt="">
                            </td>
                            <td>
                                <a name="" id="" class="btn btn-primary"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa')"
                                    href="{{ route('delete_image', ['id' => $img->id]) }}" role="button">Xóa</a>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        @if (session()->has('add'))
            <script>
                alert('{{ session()->get('add') }}');
            </script>
        @elseif (session()->has('del'))
            <script>
                alert('{{ session()->get('del') }}');
            </script>
        @endif

    </div>
@endsection

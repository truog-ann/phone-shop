@extends('client.layout')
@section('content')
    <main>
        <div class="container detail_product  mg_bottomall">
            <div class="box_leftproduct">
                <div class="box_listdm">
                    <div class="box_tendanhmuc">
                        <h4>Danh mục sản phẩm</h4>
                    </div>
                    @foreach ($categories as $data)
                        <a href="{{ route('cate.products', ['cate' => $data->name_cate]) }}"
                            class="size_dm ">{{ $data->name_cate }}</a><br>
                    @endforeach



                </div>
                <div class="box_listdm">
                    <div class="box_tendanhmuc">
                        <h4>Khuyến mại</h4>
                    </div>

                    @foreach ($promotions as $data)
                        <a href="{{ route('promotion.products', ['promotion' => $data->title_promotion]) }}"
                            class="size_dm">{{ $data->title_promotion }}</a><br>
                    @endforeach

                </div>
            </div>
            <div class="box_rightproduct">
                <div class="select_price">
                    <form action="{{ route('filter.price') }}" method="post">
                        @csrf
                        <select name="filter" id="" onchange="this.form.submit()">
                            <option value="">Lọc</option>
                            <option value="1">Giá tăng dần</option>
                            <option value="2">Giá giảm dần</option>
                        </select>
                    </form>

                </div>
                <div class="product mg_topall">
                    <h2>{{ $title }}</h2>
                    <div class="box-products"
                        style="  grid-row-gap: 30px;grid-column-gap:40px ; grid-template-columns: auto auto auto ;">
                        @foreach ($products as $data)
                            <div class="items-product">
                                <a href="{{ route('detail.product', ['id' => $data->id]) }}">
                                    <img src="{{ asset('storage/img/' . $data->img_prod) }}" alt=""></a>
                                <div class="text">
                                    <p>
                                        {{ Str::limit($data->name_product, 30) }}
                                    </p>

                                    <del>
                                        <p class="fs-6">
                                            {{ number_format($data->price, '0', '.', '.') }}
                                            VNĐ</p>
                                    </del>
                                    <p class="fs-6"> {{ number_format($data->price_promotion, '0', '.', '.') }}
                                        VNĐ</p>

                                </div>
                                <a class="view" href="{{ route('detail.product', ['id' => $data->id]) }}"><i
                                        class="fa-solid fa-money-bill-1-wave"> Mua Ngay </i></a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div>
                    {{ $products->links() }}
                </div>

            </div>
        </div>
    </main>
@endsection

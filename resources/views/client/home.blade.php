    @extends('client.layout')
    @section('content')
        <div id="banner" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img width="1110" height="500" src="{{ asset('storage/banners/banner.jpg') }}" class="d-block w-100"
                        alt="...">
                </div>
                @foreach ($banners as $banner)
                    <div class="carousel-item">
                        <img width="1110" height="500" src="{{ asset('storage/banners/' . $banner->img_banner) }}"
                            class="d-block w-100" alt="...">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-target="#banner" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#banner" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>
        <div class="container">
            <div class="category">
                <div class="box-category">
                    <img src="{{ asset('storage/banners/iphone.jpg') }}" alt="">
                    <div class="items_bt">
                        <a href="{{ route('shop') }}"> <input type="submit" value="Sản phẩm"></a>
                    </div>
                </div>
                <div class="box-categorys">
                    <div class="items_category">
                        <img src="{{ asset('storage/banners/samsung.png') }}" alt="">
                        <div class="btn">
                            <a href="{{ route('shop') }}"> <input type="submit" value="Sản phẩm"></a>
                        </div>
                    </div>
                    <div class="items_category">
                        <img src="{{ asset('storage/banners/pcZ-Flip52.png') }}" alt="">
                        <div class="btn">
                            <a href="{{ route('shop') }}"> <input type="submit" value="Sản phẩm"></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product" id="gaquatroi">
                <div class="product_title">
                    <h1>
                        <hr class="before" width="250px" align="left" color="black" size="4px">
                        <span>Top 10 Sản Phẩm </span>
                        <hr class="after" width="250px" align="right" color="black" size="4px">
                    </h1>

                </div>
                <div class="container">
                    <div class="box-products">
                        @foreach ($productsNew as $data)
                            <div class="items-product">
                                <a class="" href="{{ route('detail.product', ['id' => $data->id]) }}">
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
            </div>

            <div class="other_products">
                <div class="product_title">
                    <h1>
                        <hr class="before" width="250px" align="left" color="black" size="4px">
                        <span>Sản Phẩm Nổi Bật</span>
                        <hr class="after" width="250px" align="right" color="black" size="4px">
                    </h1>
                </div>
                <div class="box-products">

                    @foreach ($productsPopular as $data)
                        <div class="items-product">
                           <a class="" href="{{ route('detail.product', ['id' => $data->id]) }}">
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




                <div class="buttons">
                    <a href="{{ route('shop') }}">
                        <button class="btn"><span></span>
                            <p data-start="good luck!" data-text="next>>>" data-title="Xem sản phẩm khác"></p>
                        </button>
                    </a>
                </div>

            </div>
        </div>
    @endsection

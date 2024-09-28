@extends('client.layout')
@section('content')
    <div class="container">
        <main class="main_total">
            <div class="product_left">
                <img id="slider" src="{{ asset('storage/img/' . $product->img_prod) }}" alt="">
            </div>
            <div class="product_right">
                <form action="{{ route('cart.add', ['id' => $product->id]) }}" method="post">
                    @csrf
                    <h3>
                        {{ $product->name_product }}
                    </h3>

                    <p>Danh mục: <a href="{{ route('cate.products', ['cate' => $product->cates->name_cate]) }}">
                            {{ $product->cates->name_cate }}
                        </a></p>
                    <p>Giá sản phẩm: <span>
                            {{ number_format($product->price, '0', '.', '.') }} VND
                        </span></p>
                    <p>Giá khuyến mại: <span>
                            {{ number_format($product->price_promotion, '0', '.', '.') }} VND
                        </span></p>
                    <p>Số lượng trong kho:
                        @if ($product->quantity > 0)
                            Còn hàng
                        @else
                            Hết hàng
                        @endif

                    </p>

                    <div>
                        <p>Số lượng: </p>
                        <div class="d-flex my-3" style="width: 150px;">
                            <button class="btn btn-link px-2" type="button" onclick="changeValue('minus')">
                                <i class="fas fa-minus"></i>
                            </button>

                            <input id="form1" min="1" name="quantity" type="number" value="1"
                                class="form-control form-control-sm align-content-center" />

                            <button class="btn btn-link px-2" type="button" onclick="changeValue('')">
                                <i class="fas fa-plus"></i>
                            </button>

                        </div>
                    </div>

                    <script>
                        const changeValue = (action) => {
                            let numProduct = document.getElementById("form1").value;
                            if (action === "minus") {
                                if (numProduct > 1) {
                                    document.getElementById("form1").value--;
                                }
                            } else {
                                document.getElementById("form1").value++;
                            }
                        };
                    </script>

                    <br>
                    <div class="product_add_cart">
                        <i class="fa-solid fa-cart-shopping"></i> <input type="submit" value="Thêm vào giỏ hàng"
                            name="add_cart">
                    </div>
                </form>


            </div>
        </main>
        <div class="mc_right mg_bottomall">
            <button class="items_detail">Mô tả</button>
            <p class="mc_productdetails" style="margin-bottom: 20px;">*Thông tin sản phẩm</p>
            <p class="detail_pi" style="margin-bottom: 20px;">
                {{ $product->desc }}
            </p>
        </div>
    </div>
    <div class="container">
        <div class="product mg_topall">
            <div class="product_title">
                <h1>
                    <hr class="before mt-3" width="250px" align="left" color="black" size="4px">
                    <span style="text-transform: uppercase;">sản phẩm cùng loại</span>
                    <hr class="after mt-3" width="250px" align="right" color="black" size="4px">
                </h1>
            </div>
            <div class="box-products mg_bottomall">
                @foreach ($productsLikedCate as $data)
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
    </div>
    </body>


    </html>
@endsection

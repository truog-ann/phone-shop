<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" href="{{ asset('storage/logo/LogoShapes2.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ url('css/admin.css') }} ">
    <link rel="stylesheet" href="{{ url('css/bootstrap.css') }} ">
</head>

<body>
    <div class="page">
        <header class="wrapper-nav">
            <div class="account">
                <img src="{{ asset('storage/img/meo.jpg') }}" alt=""><br>
                <a class="btn btn-warning" href="{{ route('logout') }}">Đăng xuất</a>
            </div>
            <div class="category_admin">
                <ul>
                    @if (Auth::user()->roles->id == 1)
                        <li><a href="{{ route('categories.index') }}"><i class="fa-solid fa-bars"></i> Danh Mục</a></li>
                        <li><a href="{{ route('products.index') }}"><i class="fa-brands fa-product-hunt"></i> Sản
                                Phẩm</a>
                        </li>
                        <li><a href="{{ route('promotions.index') }}"><i class="fa-solid fa-chart-simple"></i> Khuyến
                                mãi
                            </a></li>
                        <li><a href="{{ route('banners.index') }}"><i class="fa-solid fa-comment"></i>Banner</a></li>
                        <li><a href="{{ route('accounts.index') }}"><i class="fa-solid fa-users "></i> Tài khoản</a>
                        </li>
                        <li><a href="{{ route('orders.index') }}"><i class="fa-solid fa-cart-arrow-down"></i>Đơn
                                Hàng</a></li>
                        <li> <a href="{{ route('home') }}"><i class="fa-solid fa-arrow-right-from-bracket"></i> Quay
                                Lại
                                Shop</a>
                        </li>
                    @else
                        <li><a href="{{ route('orders.index') }}"><i class="fa-solid fa-cart-arrow-down"></i>Đơn
                                Hàng</a></li>
                        <li> <a href="{{ route('home') }}"><i class="fa-solid fa-arrow-right-from-bracket"></i> Quay
                                Lại
                                Shop</a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="icon_share">
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-google"></i>
                <i class="fa-brands fa-youtube"></i>
                <i class="fa-brands fa-square-instagram"></i>
            </div>
        </header>
        <main>
            @yield('content')
        </main>
</body>

</html>

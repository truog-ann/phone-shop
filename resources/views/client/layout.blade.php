<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('storage/logo/LogoShapes2.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ url('css/bootstrap.css') }}" />
    <script src="{{ url('js/jquery-3.6.3.js') }}"></script>
    <script src="{{ url('js/bootstrap.js') }}"></script>
    <link rel="stylesheet" href="{{ url('css/style.css') }}" />
    <script src="{{ url('js/main.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>{{ $title }}</title>
</head>

<body>
    <header class="wrapper-nav">

        <div class="fixed">
            <div class="container">
                <nav class="account-shop">
                    <div class="greeting">
                        <p>
                            Welcome to our website
                        </p>
                    </div>
                    <div class="seach_shop">
                        <form action="{{ route('shop.search') }}" method="get" class="search">
                            @csrf
                            <input class="inputBox" id="inputBox" type="text" placeholder="Tìm sản phẩm..."
                                name="keyword" value="">
                            <i class="fa-solid fa-magnifying-glass"><input type="submit" name="search" value="">
                            </i>
                        </form>
                    </div>
                    <div class="account_items">
                        <div class="d-fle">
                            @if (Auth::check())
                                @if (Auth::user()->roles->role !== 'user')
                                    <a class="mx-2" href="{{ route('admin') }}"> Quản trị</a>
                                @endif
                                <a class=" " href="{{ route('logout') }}"> Đăng Xuất</a>
                                <a href="{{ route('profiles', ['email' => Auth::user()->email]) }}">
                                    <i class="fa fa-user text-dark pt-3 mx-2" style="font-size: 20px"></i>
                                </a>
                            @else
                                <a href="{{ route('login') }}">
                                    <input type="submit" value="Đăng Nhập">
                                </a>
                                <a href="{{ route('register') }}">
                                    <input type="submit" value="Đăng Ký">
                                </a>
                            @endif
                        </div>

                        <a class="shopping" href="{{ route('cart') }}">
                            <div style="position: relative;">
                                <i class="fa-solid fa-cart-shopping text-dark fs-4 pt-3 mx-2"></i>
                                <span class="badge bg-warning "
                                    style="position: absolute;top: 0px;right: -5px;">{{ $cart->totalQuantity() }}</span>
                            </div>
                        </a>
                        <script>
                            function toggleCart() {
                                document.querySelector('.sidecart').classList.toggle('open-cart');
                            }

                            toggleCart();
                        </script>
                    </div>
                </nav>
            </div>
            <hr>
            <div class="container">
                <nav class="category_shop">
                    <div class="logo">
                        <h1>
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('storage/logo/LogoShapes2.png') }}" alt="">
                            </a>
                        </h1>
                    </div>
                    <div class="menu">

                        <ul>
                            <li><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li><a href="{{ route('shop') }}">Sản phẩm</a></li>
                            <li><a href="{{ route('promotion') }}">Khuyến mại</a></li>
                            <li><a href="">Liên Hệ</a></li>
                            <li><a href="">Giới thiệu</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

    </header>
    <main>
        @yield('content')
    </main>

    <footer class="mt-10">
        <div class="container footer_all">
            <div class="ft_category">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('storage/logo/LogoShapes2.png') }}" alt="">
                    </a>
                </div>
                <br>
                <p>
                    17 Trịnh Văn Bô
                </p>
                <p>
                    annttph29957@fpt.edu.vn
                </p>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-google"></i>
                <i class="fa-brands fa-youtube"></i>
                <i class="fa-brands fa-square-instagram"></i>
            </div>
            <div class="ft_category">
                <h4>
                    Danh Mục Nổi Bật
                </h4>
                <ul>
                    @foreach ($categories as $data)
                        <a href="">{{ $data->name_cate }}</a>
                    @endforeach
                </ul>
            </div>
            <div class="ft_category">
                <h4>
                    Chính sách công ty
                </h4>
                <p>Vận chuyển và giao hàng</p>
                <p>Chính sách bán hàng</p>
                <p>Liên Hệ với Hiền</p>
            </div>
            <div class="ft_category">
                <h4>
                    Địa Chỉ Shop
                </h4>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14588.674990605203!2d105.606681!3d19.7667925!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3136fb182dad8681%3A0x9a3e26e542573e8!2zSMOyYSBZw6puLCBUaMOhaSBIw7JhLCBUcmnhu4d1IFPGoW4sIFRoYW5oIEhvw6E!5e1!3m2!1svi!2s!4v1688375583040!5m2!1svi!2s"
                    width="300" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
</body>

</html>

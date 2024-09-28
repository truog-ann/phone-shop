<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Controllers\service\Cart;
use Illuminate\Http\Request;
use \App\Models\Banner;
use \App\Models\ImgBanner;
use \App\Models\Category;
use \App\Models\Product;
use \App\Models\Promotion;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {

        $id_banner = Banner::orderBy('id', 'desc')->take(1)->get('id');
        $banners = ImgBanner::where('banner_id', $id_banner[0]->id)->get();
        $productsNew = Product::orderBy('id', 'desc')->take(10)->get();
        $productsPopular = Product::orderBy('views', 'desc')->take(10)->get();
        $title = 'Trang chủ';
        return view('client.home', compact('productsPopular', 'banners', 'productsNew', 'title'));
    }
    public function search(Request $request)
    {
        $products = Product::where('name_product', 'like', $request->keyword)->paginate(6);
        $promotions = Promotion::where('id', '!=', 1)->where('end', '>', now())->get();
        $title = 'Của hàng';
        return view('client.products.shop', compact('promotions', 'products', 'title'));

    }
    public function shop()
    {
        $products = Product::paginate(6);
        $promotions = Promotion::where('id', '!=', 1)->where('end', '>', now())->get();
        $title = 'Của hàng';
        return view('client.products.shop', compact('promotions', 'products', 'title'));

    }
    public function prodCate($id)
    {
        $cate = Category::where('name_cate', $id)->get();
        $products = Product::where('cate_id', $cate[0]->id)->paginate(9);
        $title = "Sản phẩm của " . $cate[0]->name_cate;
        $promotions = Promotion::where('id', '!=', 1)->where('end', '>', now())->get();
        return view("client.products.shop", compact("products", "title", "promotions"));
    }
    public function prodPromotion($id)
    {
        $promo = Promotion::where('title_promotion', $id)->get();
        if ($promo[0]->end > now()) {
            $products = Product::where('promotion_id', $promo[0]->id)->paginate(9);
            $title = "Sản phẩm của " . $promo[0]->title_promotion;
            $promotions = Promotion::where('id', '!=', 1)->where('end', '>', now())->get();
            return view("client.products.shop", compact("products", "title", "promotions"));
        } else {
            return redirect(route('shop'))->with('error', 'Chương trình khuyến mại đã hết.');
        }

    }
    public function shopPromotion()
    {
        $products = Product::where('promotion_id', '!=', 1)->paginate(9);
        if ($products[0]->promotions->end > now()) {
            $promotions = Promotion::where('id', '!=', 1)->where('end', '>', now())->get();
            $title = 'Sản phẩm khuyến mại';
            return view("client.products.shop", compact("products", "title", "promotions"));

        } else {
            return redirect(route('shop'))->with('error', 'Chương trình khuyến mại đã hết.');
        }

    }
    public function filterPrice(Request $request )
    {
        if ($request->filter == 1) {
            $products = Product::orderBy('price_promotion')->paginate(9);
            $title = 'Giá tăng dần';
        } else {
            $products = Product::orderBy('price_promotion', 'desc')->paginate(9);
            $title = 'Giá giảm dần';

        }
        $promotions = Promotion::where('id', '!=', 1)->where('end', '>', now())->get();
        return view("client.products.shop", compact("products", "title", "promotions"));

    }
    public function detailProd($id )
    {
        $title = 'Sản Phẩm';
        $product = Product::find($id);
        $product->update([
            'views' => $product->view + 1
        ]);
        $productsLikedCate = Product::where('cate_id', $product->cate_id)
            ->where('id', '<>', $id)->take(10)->get();
        return view("client.products.detail", compact("title", "product", "productsLikedCate"));
    }

}

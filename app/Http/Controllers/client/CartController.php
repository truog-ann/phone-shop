<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Controllers\service\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    /**
     * Class constructor.
     */
    public function index(Cart $cart)
    {
        $categories = Category::all();
        $title = 'Giỏ hàng';
        return view('client.carts.cart', compact('cart', 'title', 'categories'));
    }
    public function addToCart(Request $request, Cart $cart, $id)
    {

        $product = Product::find($id);
        if ($product->quantity == 0) {
            return back()->with('error', 'Sản phẩm đã hết hàng!');
        }
        $cart->add($product, $request->quantity);
        // dd(session('cart'));
        return back()->with('success', 'Thêm sản phẩm thành công');
    }
    public function minusCart(Cart $cart, $id)
    {
        $product = Product::find($id);
        $cart->update($product, 'minus');
        return back()->with('success', 'Cập nhật dơn hàng thành công');
    }
    public function plusCart(Cart $cart, $id)
    {
        $product = Product::find($id);
        $cart->update($product, 'plus');
        return back()->with('success', 'Cập nhật dơn hàng thành công');
    }
    public function removeItem(Cart $cart, $id)
    {
        $cart->remove($id);
        return back()->with('success', "Xóa sản phẩm khỏi giỏ hàng thành công");
    }
    public function removeAllItem(Cart $cart)
    {
        $cart->removeAll();
        return back()->with('success', "Xóa giỏ hàng thành công");

    }

}

<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Controllers\service\Cart;
use App\Http\Requests\StoreOrderRequest;
use App\Mail\OrderSuccess;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    //
    public function create()
    {
        $title = 'Thanh toán đơn hàng';
        return view('client.order.checkout', compact('title'));
    }
    public function success(Cart $cart)
    {
        $cart->removeAll();
        $title = 'Đặt hàng thành công';
        return view('client.order.success', compact('title'));
    }
    public function store(StoreOrderRequest $request, Cart $cart)
    {
        $request->merge([
            'user_id' => Auth::user()->id,
            'quantity_products' => $cart->totalQuantity(),
            'total' => $cart->totalPrice(),
            'date_order' => now(),
            'status' => 'Chờ xác nhận',
        ]);
        $orderId = Order::create($request->all());
        foreach ($cart->list() as $item) {
            $product = Product::find($item['product_id']);
            $product->update([
                'quantity' => $product->quantity - $item['quantity'],
            ]);
            OrderDetail::create([
                'order_id' => $orderId->id,
                'name_product' => $product->name_product,
                'name_cate' => $product->cates->name_cate,
                'img' => $product->img_prod,
                'price' => $product->price_promotion > 0 ? $product->price_promotion : $product->price,
                'quantity' => $item['quantity'],
                'total' => $item['quantity'] * ($product->price_promotion > 0 ? $product->price_promotion : $product->price),
            ]);
        }
        $cart->removeAll();
        Mail::to($request->email)->send(new OrderSuccess($orderId->id));
        return redirect(route('order.success.user'))->with('success', 'Đặt dơn hàng thành công');
    }

    public function orderDel($id)
    {
        OrderDetail::where('order_id', $id)->delete();
        Order::find($id)->delete();
        return back()->with('success', 'Hủy dơn hàng thành công');
    }
    public function clearOrder(Cart $cart)
    {
        $cart->removeAll();
        return redirect()->route('home')->with('success', 'Hủy đơn hàng thành công');
    }
    public function orderUser()
    {
        $orders = Order::where('user_id', Auth::user()->id)->paginate(2);
        $title = "Đơn hàng";
        return view("client.users.orders", compact('title', 'orders'));
    }
    public function orderDetail($id)
    {
        $order = Order::find($id);
        if (!$order || $order->user_id != Auth::user()->id) {
            abort(404);
        }
        $details = OrderDetail::where('order_id', $id)->paginate(10);
        $title = "Chi tiết đơn hàng";
        return view("client.users.order-detail", compact('title', 'order', 'details'));
    }



}

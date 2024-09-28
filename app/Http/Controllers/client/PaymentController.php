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

class PaymentController extends Controller
{
    //
    public function vnpay_payment(Request $request, Cart $cart)
    {

        foreach ($request->all() as $key) {
            if ($key == null) {
                return redirect()->route('profiles', ['email' => Auth::user()->email])
                    ->with('error', 'Bạn chưa đủ thông tin để thanh toán online');
            }
        }
        $vnp_TmnCode = "06WRAZKZ"; //Mã định danh merchant kết nối (Terminal Id)
        $vnp_HashSecret = "ECXGHVDIZVLAEIITPPMBFJKGSNXYUJMS"; //Secret key
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/order/order-success";
        $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
        $apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
        $vnp_TxnRef = rand(1, 1000); //Mã giao dịch thanh toán tham chiếu của merchant
        $vnp_Amount = $request->total_price; // Số tiền thanh toán
        $vnp_Locale = 'VN'; //Ngôn ngữ chuyển hướng thanh toán
        $vnp_BankCode = 'NCB'; //Mã phương thức thanh toán
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount * 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => "Thanh toan GD:" . $vnp_TxnRef,
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
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
        Mail::to($request->email)->send(new OrderSuccess($orderId->id));
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        header('Location: ' . $vnp_Url);
        die();

    }
}

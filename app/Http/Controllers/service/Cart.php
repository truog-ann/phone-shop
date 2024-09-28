<?php
namespace App\Http\Controllers\service;

use App\Models\Product;
use Illuminate\Http\Request;

class Cart
{
    public $items = [];
    public $total_quantity = 0;
    public $total_price = 0;

    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
    }
    public function list()
    {
        return $this->items;
    }

    public function add($product, $quantity = 1)
    {
        $item = [
            'product_id' => $product->id,
            'name' => $product->name_product,
            'price' => $product->price_promotion > 0 ? $product->price_promotion : $product->price,
            'image' => $product->img_prod,
            'quantity' => $quantity,
        ];
        if (isset($this->items[$product->id])) {
            $this->items[$product->id]['quantity'] += $quantity;
            return session(['cart' => $this->items]);

        }
        $this->items[$product->id] = $item;
        return session(['cart' => $this->items]);

    }
    public function update($product, $method)
    {
        if (isset($this->items[$product->id])) {
            if ($method == 'minus') {
                $this->items[$product->id]['quantity']--;
                return session(['cart' => $this->items]);

            } else {
                $this->items[$product->id]['quantity']++;
                return session(['cart' => $this->items]);
            }
        }

    }
    public function remove($id)
    {
        unset($this->items[$id]);
        return session(['cart' => $this->items]);
    }
    public function removeAll()
    {
        unset($this->items);
        return session(['cart' => []]);


    }

    public function totalPrice()
    {
        $totalprice = 0;
        foreach ($this->items as $item) {
            $totalprice += $item['quantity'] * $item['price'];
        }
        return $totalprice;
    }

    public function totalQuantity()
    {
        $totalquantity = 0;
        foreach ($this->items as $item) {
            $totalquantity += $item['quantity'];
        }
        return $totalquantity;
    }
}
?>
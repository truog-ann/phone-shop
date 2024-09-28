<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use \Barryvdh\DomPDF\Facade\Pdf as PDF;

class OrderAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Order::paginate(10);
        $title = 'Danh sách đơn hàng';
        return view('admin.orders.index', compact('orders', 'title'));
    }
    public function print_order($id)
    {
        $data = [
            'order' => Order::find($id),
            'orders' => OrderDetail::where('order_id', $id)->get(),
            'num'=>1,
        ];
        $html = view("admin.orders.invoices", compact('data'))->render();
        $pdf = PDF::loadHTML($html)->setPaper('A4', 'lands');
        return $pdf->stream('invoice.pdf');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function success($id)
    {
        Order::find($id)->update([
            'status' => 'Đã xác nhận'
        ]);
        return back()->with('success', 'Xác nhận đơn hàng thành công');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $title = 'Chi tiết đơn hàng';
        $orders = OrderDetail::where('order_id', $id)->paginate(10);
        return view('admin.orders.show', compact('orders', 'id', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $order = Order::find($id);
        $title = 'Cập nhật đơn hàng';
        return view('admin.orders.update', compact('title', 'order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Order::find($id)->update(['status' => $request->status]);
        return redirect()->route('orders.index')
            ->with('success', 'Đã cập nhật thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

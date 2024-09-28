<?php

namespace App\Http\Controllers\admin;

use \App\Models\Promotion;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePromotionRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $promotions = Promotion::all();
        $title = 'Quản lý khuyến mại';
        return view('admin.promotions.index', compact('promotions', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.promotions.add', ['title' => 'Thêm khuyến mại']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePromotionRequest $request)
    {
        //
        Promotion::create($request->all());
        return redirect()->route('promotions.index')->with('success', 'Thêm thành công');

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
        $promotion = Promotion::find($id);
        $title = "Sửa khuyến mại";
        return view('admin.promotions.edit', compact('promotion', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePromotionRequest $request, $id)
    {
        //
        Promotion::find($id)->update($request->all());
        return redirect()->route('promotions.index')->with('success', 'Sửa thành công');
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
        Promotion::find($id)->delete();
        Product::where('promotion_id', $id)->update(['promotion_id' => 1]);
        return back()->with('success', 'Xóa thành công');

    }
}

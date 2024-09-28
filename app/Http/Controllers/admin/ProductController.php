<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::orderBy('id', 'desc')->paginate(10);
        $title = 'Quản lý sản phẩm';
        return view('admin.products.index', compact('products', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $promotions = Promotion::all();
        $title = 'Thêm sản phẩm';
        return view('admin.products.add', compact('title', 'categories', 'promotions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //
        if ($request->hasFile('file_upload')) {
            $file_name = time() . '_' . $request->file('file_upload')->getClientOriginalName();
            $request->file('file_upload')->storeAs('public/img', $file_name);
            $request->merge(['img_prod' => $file_name]);
            $request->merge(['views' => 0]);
            Product::create($request->all());
            return redirect()->route('products.index')
                ->with('success', "Thêm thành công");
        } else {
            return back()->with('file', "Vui lòng chọn ảnh cho sản phẩm!");
        }
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
        $product = Product::find($id);
        $title = 'Chi tiết sản phẩm';
        return view('admin.products.show', compact('product', 'title'));
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
        $product = Product::find($id);
        $title = 'Sửa sản phẩm';
        $categories = Category::all();
        $promotions = Promotion::all();
        return view('admin.products.edit', compact('product', 'categories', 'promotions', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id)
    {
        //
        if ($request->hasFile('file_upload')) {
            $file_name = time() . '_' . $request->file('file_upload')->getClientOriginalName();
            $request->file('file_upload')->storeAs('public/img', $file_name);
            $request->merge(['img_prod' => $file_name]);
            Product::find($id)->update($request->all());
            return redirect()->route('products.index')
                ->with('success', "Sửa thành công");
        } else {
            Product::find($id)->update($request->all());
            return redirect()->route('products.index')
                ->with('success', "Sửa thành công");

        }
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
        Product::find($id)->delete();
        return back()->with('del', 'Xóa thành công');

    }
}

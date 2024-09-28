<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccountRequest;
use App\Models\Order;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $accounts = User::all();
        $title = 'Danh sách tài khoản';
        return view('admin.accounts.index', compact('accounts', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        $title = 'Thêm tài khoản';
        return view('admin.accounts.add', compact('roles', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAccountRequest $request)
    {
        //
        // dd($request);
        $password = Hash::make($request->input('pass_original'));
        $request->merge(["password" => $password]);
        User::create($request->all());
        return redirect()->route('accounts.index')->with('success', 'Tạo mới thành công');

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
        $account = User::find($id);
        $roles = Role::all();
        $title = 'Phân quyền';
        return view("admin.accounts.edit", compact("account", "roles", 'title'));
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
        $request->validate([
            'role_id' => ['required'],
        ]);
        User::find($id)->update($request->all());
        return redirect()->route('accounts.index')->with('success', 'Cập nhật thành công');
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
        if (Auth::user()->id == $id) {
            return back()->with('error', 'Không thể xóa tài khoản đang đăng nhập');
        }
        Order::where('user_id', $id)
            ->where('status', '!=', 'Giao hàng thành công')
            ->update(["user_id" => 0]);
        ;
        User::find($id)->delete();
        return back()->with('success', 'Xóa thành công');
    }
}

<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Controllers\service\Cart;
use App\Http\Requests\EditRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\RePassRequest;
use App\Mail\ResetPass;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    //
    public function login()
    {

        $title = 'Đăng nhập';
        return view('client.users.sign-in', compact('title'));

    }
    public function doLogin(LoginRequest $request)
    {
        $credentials = ([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            return redirect()->route('home')->with('success', 'Đăng nhập thành công');
        }
        return back()->with(
            'error',
            'Sai email hoặc mật khẩu'
        );
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Đăng xuất thành công');
    }
    public function register()
    {

        $title = 'Đăng ký';
        return view('client.users.register', compact('title'));
    }
    public function doregister(RegisterRequest $request)
    {
        // dd($request);
        $pass = Hash::make($request->input('pass_original'));
        $request->merge(["password" => $pass]);
        User::create($request->all());
        return redirect()->route('login')->with('success', 'Đăng ký thành công');

    }
    public function profiles($email, )
    {

        $user = User::where('id', Auth::user()->id)->first();
        $title = "Thông tin tài khoản";
        return view('client.users.profiles', compact('user', 'title'));
    }
    public function editUser(EditUserRequest $request)
    {
        $user = User::find(Auth::user()->id);
        $user->update([
            'name_user' => $request->input('name_user'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address')
        ]);
        return back()->with('success', 'Cập nhật thành công');
    }
    public function resetPass(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'email' => ['required', 'email', 'exists:users,email']
            ], [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email chưa đúng định dạng',
                'email.exists' => 'Email chưa được đăng kí'
            ]);
            $token = Hash::make($request->email);
            Mail::to($request->email)->send(new ResetPass($token));
            return back()->with('success', 'Check mail để đặt lại mật khẩu');

        }
        return view('client.users.re-pass', ['title' => 'Quên mật khẩu']);
    }
    public function resetPassSuccess(Request $request)
    {
        $users = User::all();
        foreach ($users as $user) {
            if (Hash::check($user->email, $request->token)) {
                $user->update(['password' => Hash::make('123456789')]);
                break;
            }
        }
        return redirect(route('login'))->with('success', 'Đặt lại mật khẩu thành công');
    }
    public function pass()
    {

        $title = "Đổi mật khẩu";
        return view('client.users.change-pass', compact('title'));
    }

    public function changePass(RePassRequest $request)
    {
        if (Hash::check($request->old_pass, Auth::user()->password)) {
            User::find(Auth::user()->id)
                ->update([
                    'password' => Hash::make($request->new_pass)
                ]);
            return back()->with('success', 'Đã đổi mật khẩu thành công!');
        } else {
            return back()->with('error', 'Sai mật khẩu!');

        }
        ;
    }
}

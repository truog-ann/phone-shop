<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\ImgBanner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $banners = Banner::all();
        $title = 'Quản lý banner';
        return view('admin.banners.index', compact('banners', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = 'Thêm tiêu đề banner';
        return view('admin.banners.add', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBannerRequest $request)
    {
        //
        $banner = Banner::create([
            'title_banner' => $request->input('title_banner'),
        ]);
        if ($request->hasFile('img_banner')) {
            foreach ($request->file('img_banner') as $image) {
                $nameImg = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/banners', $nameImg);
                ImgBanner::create([
                    'banner_id' => $banner->id,
                    'img_banner' => $nameImg
                ]);
            }
            return redirect()->route('banners.index')
                ->with('success', 'Thêm thành công');
        }
        return back()->with('error', 'Chọn banner cho tiêu đề');

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
        $title = 'Ảnh banner';
        $banner_id = $id;
        $title_banner = Banner::find($id)->title_banner;
        $banners = ImgBanner::where('banner_id', $id)->get();
        return view('admin.banners.show', compact('banners', 'title', 'title_banner', 'banner_id'));

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
        $title = "Sửa Thông Tin Banner";
        $banner = Banner::findOrFail($id);
        return view("admin.banners.edit", compact("title", "banner"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBannerRequest $request, $id)
    {
        //
        Banner::find($id)->update($request->all());
        return redirect(route("banners.index"))->with("success", "Cập nhật thành công");
    }
    public function delImage($id)
    {
        //
        ImgBanner::find($id)->delete();
        return back()->with('success', 'Xóa thành công');

    }
    public function addImage(Request $request, $id)
    {
        //
        $title = 'Thêm ảnh banner';
        if ($request->isMethod('post')) {
            if ($request->hasFile('img_banner')) {
                foreach ($request->file('img_banner') as $image) {
                    $nameImg = time() . '_' . $image->getClientOriginalName();
                    $image->storeAs('public/banners', $nameImg);
                    ImgBanner::create([
                        'banner_id' => $id,
                        'img_banner' => $nameImg
                    ]);
                }
                return redirect()->route('banners.show', ['banner' => $id])
                    ->with('success', 'Thêm thành công');
            } else {
                return back()->with('error', 'Chưa thêm banner!!');
            }
        }
        return view("admin.banners.upload", compact('id', 'title'));
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
        ImgBanner::where("banner_id", $id)->delete();
        Banner::find($id)->delete();
        return back()->with('success', 'Xóa thành công');
    }
}

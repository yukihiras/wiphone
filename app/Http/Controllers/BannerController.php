<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BannerController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function loadListBanner(Request $request)
    {
        $banner = new Banner();
        $this->v['_title'] = "danh sách banner";
        $this->v['exitParams'] = $request->all();
        $this->v['list'] = $banner->listBanner();
        return view('banner.index', $this->v);
    }
    public function add(BannerRequest $request)
    {
        $method_route = "route_BackEnd_Banner_index";
        $this->v['_title'] = "thêm banner";
        if ($request->isMethod('post')) {
            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);

            //upload file
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $params['cols']['image'] = $this->uploadFile($request->file('image'));
            }

            $modelBanner = new Banner();
            $res = $modelBanner->saveNew($params);
            if ($res == null) {
                return redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'thêm mới thành công danh mục');
            } else {
                Session::flash('error', 'lỗi thêm mới danh mục');
            }
        }
        return view('banner.add', $this->v);
    }

    public function detail($id, Request $request)
    {
        $this->v['_title'] = "Chi tiết danh mục";
        $modelBanner = new Banner();
        $objItem = $modelBanner->loadOne($id);
        $this->v['objItem'] = $objItem;
        return view('banner.detail', $this->v);
    }


    public function update($id, BannerRequest $request)
    {
        $method_route = 'route_BackEnd_Banner_index';
        $params = [];
        $params['cols'] = $request->post();
        $params['cols']['id'] = $id;
        unset($params['cols']['_token']);
        //upload file
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $params['cols']['image'] = $this->uploadFile($request->file('image'));
        }

        $modelBanner = new Banner();
        $res = $modelBanner->saveUpdate($params);
        if ($res == null) {
            Session::flash('error', 'Lỗi cập nhật bản ghi');
            return redirect()->route($method_route, ['id' => $id]);
        } elseif ($res == 1) {

            Session::flash('success', 'cập nhật bản ghi' . $id . "Thành công");
            return redirect()->route($method_route, ['id' => $id]);
        } else {

            Session::flash('error', 'Lỗi cập nhật bản ghi', $id);
            return redirect()->route($method_route, ['id' => $id]);
        }
    }
    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('uploadWebImage', $fileName, 'public');
    }
    public function delete($id)
    {
        $method_route = 'route_BackEnd_Banner_index';
        //dd($id);
        $delete = Banner::destroy($id);
        if (!$delete) {
            return redirect()->back();
        }
        return redirect()->route($method_route)->with('success', 'Xoá thành công ');;
    }
}


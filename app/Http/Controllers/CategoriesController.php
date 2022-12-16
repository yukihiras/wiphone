<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriesRequest;
use App\Models\Categories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function loadListCategory(Request $request)
    {
        $categories = new Categories();
        $this->v['_title'] = "danh sách danh mục";
        $this->v['exitParams'] = $request->all();
        $this->v['list'] = $categories->listCategories();
        return view('categories.index', $this->v);
    }
    public function add(CategoriesRequest $request)
    {
        $method_route = "route_BackEnd_Categories_index";
        $this->v['_title'] = "thêm danh mục";
        if ($request->isMethod('post')) {
            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);

            $modelCategories = new Categories();
            $res = $modelCategories->saveNew($params);
            if ($res == null) {
                return redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'thêm mới thành công danh mục');
            } else {
                Session::flash('error', 'lỗi thêm mới danh mục');
            }
        }
        return view('categories.add', $this->v);
    }

    public function detail($id, Request $request)
    {
        $this->v['_title'] = "Chi tiết danh mục";
        $modelDanhMuc = new Categories();
        $objItem = $modelDanhMuc->loadOne($id);
        $this->v['objItem'] = $objItem;
        return view('categories.detail', $this->v);
    }


    public function update($id, CategoriesRequest $request)
    {
        $method_route = 'route_BackEnd_Categories_Detail';
        $params = [];
        $params['cols'] = $request->post();
        $params['cols']['id'] = $id;
        unset($params['cols']['_token']);
        $modelCategories = new Categories();
        $res = $modelCategories->saveUpdate($params);
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


    public function delete($id)
    {
        $method_route = 'route_BackEnd_Categories_index';
        //dd($id);
        $delete = Categories::destroy($id);
        if (!$delete) {
            return redirect()->back();
        }
        return redirect()->route($method_route)->with('success', 'Xoá thành công ');;
    }
}

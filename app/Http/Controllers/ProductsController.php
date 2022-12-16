<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProducutsRequest;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function loadListProducts(Request $request)
    {
        $products = new Products();
        $this->v['_title'] = "danh sách sản phẩm";
        $this->v['exitParams'] = $request->all();
        $this->v['list'] = $products->listProducts();
        return view('products.index', $this->v);
    }
    public function add(ProducutsRequest $request)
    {
        $method_route = "route_BackEnd_Products_index";
        $this->v['_title'] = "thêm sản phẩm";

        $cate = new Categories();
        $this->v['exitParams'] = $request->all();
        $this->v['list'] = $cate->listCategories();

        if ($request->isMethod('post')) {
            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);


            //upload file
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $params['cols']['image'] = $this->uploadFile($request->file('image'));
            }

            $modelProducts = new Products();
            $res = $modelProducts->saveNew($params);
            if ($res == null) {
                return redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'thêm mới thành công sản phẩm');
            } else {
                Session::flash('error', 'lỗi thêm mới sản phẩm');
            }
        }
        return view('products.add', $this->v);
    }

    public function detail($id, Request $request)
    {
        $this->v['_title'] = "Chi tiết sản phẩm";
        $cate = new Categories();
        $this->v['exitParams'] = $request->all();
        $this->v['list'] = $cate->listCategories();

        $modelSanPham = new Products();
        $objItem = $modelSanPham->loadOne($id);
        $this->v['objItem'] = $objItem;
        return view('products.detail', $this->v);
    }

    public function update($id, ProducutsRequest $request)
    {
        $method_route = 'route_BackEnd_Products_Detail';
        $params = [];
        $params['cols'] = $request->post();
        $params['cols']['id'] = $id;
        unset($params['cols']['_token']);
        //upload file
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $params['cols']['image'] = $this->uploadFile($request->file('image'));
        }
        $modelProducts = new Products();
        $res = $modelProducts->saveUpdate($params);
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
        $method_route = 'route_BackEnd_Products_index';
        //dd($id);
        $delete = Products::destroy($id);
        if (!$delete) {
            return redirect()->back();
        }
        return redirect()->route($method_route)->with('success', 'Xoá thành công ');;
    }
}

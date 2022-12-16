<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrdersRequest;
use App\Models\Orders;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function loadListOrders(Request $request)
    {
        $orders = new Orders();
        $this->v['_title'] = "danh sách hóa đơn";
        $this->v['exitParams'] = $request->all();
        $this->v['list'] = $orders->listOrders();
        return view('orders.index', $this->v);
    }
    public function add(OrdersRequest $request)
    {
        $method_route = "route_BackEnd_Orders_index";
        $this->v['_title'] = "thêm hóa đơn";

        $users = new Users();
        $this->v['exitParams'] = $request->all();
        $this->v['list'] = $users->listUsers();

        if ($request->isMethod('post')) {
            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);
            $modelOrders = new Orders();
            $res = $modelOrders->saveNew($params);
            if ($res == null) {
                return redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'thêm mới thành công hóa đơn');
            } else {
                Session::flash('error', 'lỗi thêm mới hóa đơn');
            }
        }
        return view('orders.add', $this->v);
    }

    public function detail($id, Request $request)
    {
        $this->v['_title'] = "Chi tiết hóa đơn";
        $users = new Users();
        $this->v['exitParams'] = $request->all();
        $this->v['list'] = $users->listUsers();
        $modelOrders = new Orders();
        $objItem = $modelOrders->loadOne($id);
        $this->v['objItem'] = $objItem;
        return view('orders.detail', $this->v);
    }

    public function update($id, OrdersRequest $request)
    {
        $method_route = 'route_BackEnd_Orders_Detail';


        $params = [];
        $params['cols'] = $request->post();
        $params['cols']['id'] = $id;
        unset($params['cols']['_token']);
        $modelOrders = new Orders();
        $res = $modelOrders->saveUpdate($params);
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
        $method_route = 'route_BackEnd_Orders_index';
        //dd($id);
        $delete = Orders::destroy($id);
        if (!$delete) {
            return redirect()->back();
        }
        return redirect()->route($method_route)->with('success', 'Xoá thành công ');;
    }
}

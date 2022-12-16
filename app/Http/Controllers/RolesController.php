<?php

namespace App\Http\Controllers;

use App\Http\Requests\RolesRequest;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RolesController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function loadListRoles(Request $request)
    {
        $roles = new Roles();
        $this->v['_title'] = "danh sách chức vụ";
        $this->v['exitParams'] = $request->all();
        $this->v['list'] = $roles->listRoles();
        return view('roles.index', $this->v);
    }
    public function add(RolesRequest $request)
    {
        $method_route = "route_BackEnd_Roles_index";
        $this->v['_title'] = "thêm danh mục";
        if ($request->isMethod('post')) {
            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);

            $modelRoles = new Roles();
            $res = $modelRoles->saveNew($params);
            if ($res == null) {
                return redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'thêm mới thành công danh mục');
            } else {
                Session::flash('error', 'lỗi thêm mới danh mục');
            }
        }
        return view('roles.add', $this->v);
    }

    public function detail($id, Request $request)
    {
        $this->v['_title'] = "Chi tiết chức vụ";
        $modelRoles = new Roles();
        $objItem = $modelRoles->loadOne($id);
        $this->v['objItem'] = $objItem;
        return view('roles.detail', $this->v);
    }


    public function update($id, RolesRequest $request)
    {
        $method_route = 'route_BackEnd_Roles_Detail';
        $params = [];
        $params['cols'] = $request->post();
        $params['cols']['id'] = $id;
        unset($params['cols']['_token']);


        $modelRoles = new Roles();
        $res = $modelRoles->saveUpdate($params);
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
        $method_route = 'route_BackEnd_Roles_index';
        //dd($id);
        $delete = Roles::destroy($id);
        if (!$delete) {
            return redirect()->back();
        }
        return redirect()->route($method_route)->with('success', 'Xoá thành công ');;
    }
}

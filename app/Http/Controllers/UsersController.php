<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\Roles;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function loadListUser(Request $request)
    {
        $users = new Users;
        $this->v['_title'] = "danh sách người dùng";
        $this->v['exitParams'] = $request->all();
        $this->v['list'] = $users->listUsers();
        return view('users.index', $this->v);
    }
    public function add(UsersRequest $request)
    {
        $method_route = "route_BackEnd_Users_index";
        $this->v['_title'] = "thêm người dùng";

        $roles = new Roles();
        $this->v['exitParams'] = $request->all();
        $this->v['list'] = $roles->listRoles();


        if ($request->isMethod('post')) {
            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);

            //upload file
            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                $params['cols']['avatar'] = $this->uploadFile($request->file('avatar'));
            }

            $modelUsers = new Users();

            $res = $modelUsers->saveNew($params);
            if ($res == null) {
                return redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'thêm mới thành công người dùng');
            } else {
                Session::flash('error', 'lỗi thêm mới người dùng');
            }
        }
        return view('users.add', $this->v);
    }

    public function detail($id, Request $request)
    {
        $this->v['_title'] = "Chi tiết người dùng";
        $modelNguoiDung = new Users();
        $objItem = $modelNguoiDung->loadOne($id);
        $this->v['objItem'] = $objItem;

        $roles = new Roles();
        $this->v['exitParams'] = $request->all();
        $this->v['list'] = $roles->listRoles();

        return view('users.detail', $this->v);
    }

    public function update($id, UsersRequest $request)
    {
        $method_route = 'route_BackEnd_Users_Detail';


        $params = [];
        $params['cols'] = $request->post();
        $params['cols']['id'] = $id;
        unset($params['cols']['_token']);
        //upload file
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $params['cols']['avatar'] = $this->uploadFile($request->file('avatar'));
        }

        if (!is_null($params['cols']['password'])) {
            $params['cols']['password'] = Hash::make($params['cols']['password']);
        } else {
            unset($params['cols']['password']);
        }

        $modelUsers = new Users();
        $res = $modelUsers->saveUpdate($params);
        if ($res == null) {
            Session::flash('error', 'Lỗi cập nhật bản ghi');
            return redirect()->route($method_route, ['id' => $id]);
        } elseif ($res == 1) {
            Session::flash('success', 'cập nhật bản ghi ' . $id . " Thành công");
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
        $method_route = 'route_BackEnd_Users_index';
        //dd($id);
        $delete = Users::destroy($id);
        if (!$delete) {
            return redirect()->back();
        }
        return redirect()->route($method_route)->with('success', 'Xoá thành công ');;
    }
}

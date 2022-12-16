<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'orders.id',
        'orders.customerName',
        'orders.address',
        'orders.phoneNumber',
        'orders.email',
        'orders.description',
        'orders.totalPrice',
        'users.username as userName',
        'orders.created_at'
    ];
    public function listOrders($params = [])
    {
        $query = DB::table($this->table)
            ->select($this->fillable)
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->orderBy('created_at', 'DESC');
        $list = $query->paginate(5); //mỗi trang hiển thị 5 bản ghi
        return $list;
    }

    public function saveNew($params)
    {
        $data = array_merge(
            $params['cols'],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        $res = DB::table($this->table)->insertGetId($data);
        return $res;
    }

    //load ra chi tiết sản phẩm
    public function loadOne($id, $params = [])
    {
        $query = DB::table($this->table)->where('id', '=', $id);
        $obj = $query->first();
        return $obj;
    }

    public function saveUpdate($params)
    {
        if (empty($param['cols']['id'])) {
            Session::push('errors', "không xác định bản ghi cập nhật");
        }

        $dataUpdate = [];
        foreach ($params['cols'] as $colName => $val) {
            if ($colName == 'id') continue;
            $dataUpdate[$colName] = (strlen($val) == 0) ? null : $val;
        }

        $res =  DB::table($this->table)->where('id', '=', $params['cols']['id'])->update($dataUpdate);
        return $res;
    }
}

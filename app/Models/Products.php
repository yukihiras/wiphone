<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'products.id',
        'products.name',
        'products.price',
        'products.image',
        'products.description',
        'categories.name as cateName',
        'products.created_at'
    ];
    public function listProducts($params = [])
    {
        $query = DB::table($this->table)
            ->select($this->fillable)
            ->join('categories', 'categories.id', '=', 'products.cate_id')
            ->orderBy('created_at', 'DESC');
        $list = $query->paginate(8); //mỗi trang hiển thị 8 bản ghi
        return $list;
    }

    public function loadListProductByCate($id, $param = []){
        $query = DB::table($this->table)
            ->join('categories', 'categories.id', '=', 'products.cate_id')
            ->select($this->fillable)
            ->where('products.cate_id', '=', $id);
        $list = $query->paginate(9);
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

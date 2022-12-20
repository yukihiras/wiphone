<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductByCateController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function proByCate($id_cate, Request $request){
        $categories = new Categories();
        $this->v['exitParams'] = $request->all();
        $this->v['list'] = $categories->listCategories();

        $listProByCate = new Products();
        $this->v['exitParams'] = $request->all();
        $this->v['listProByCate'] = $listProByCate->loadListProductByCate($id_cate);
        return view('client.proByCate', $this->v);
    }
}

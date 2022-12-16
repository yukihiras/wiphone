<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function home(Request $request)
    {
        $categories = new Categories();
        $this->v['_title'] = "danh sách danh mục";
        $this->v['exitParams'] = $request->all();
        $this->v['list'] = $categories->listCategories();

        $banner = new Banner();
        $this->v['exitParams'] = $request->all();
        $this->v['listBanner'] = $banner->listBanner();

        $products = new Products();
        $this->v['exitParams'] = $request->all();
        $this->v['listProducts'] = $products->listProducts();


        return view('client.products', $this->v);
    }


}

<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class ProducByCateController extends Controller
{
    public function proByCate(Request $request) {
        $categories = new Categories();
        $this->v['_title'] = "danh sách danh mục";
        $this->v['exitParams'] = $request->all();
        $this->v['list'] = $categories->listCategories();

        return view('proByCate', $this->v);
    }
}

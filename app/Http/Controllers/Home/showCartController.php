<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class showCartController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }



    public function addToCart($id)
    {

        $product = Products::find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1
            ];
        }
        session()->put('cart', $cart);
        return response()->json([
            'code' => 200,
            'message' => 'thành công'
        ], 200);
    }
    public function showCart(Request $request)
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

        //hiển thị giỏ hàng ra view
        $this->v['cart'] = session()->get('cart');

        return view('client.showCart', $this->v);
    }


    public function updateCart(Request $request){

        if ($request->id && $request->quantity){
            $cart =  session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            $cart = session()->get('cart', $cart);
            $showCart = view('client.showCart', compact('cart'))->render();
            return response()->json(['showCart' => $showCart, 'code' => 200], 200);
        }

    }

    public function deleteCart(Request $request) {

        if ($request->id){
            $cart =  session()->get('cart');
            unset($cart[$request->id]);
            session()->put('cart', $cart);
            $cart = session()->get('cart', $cart);
            $showCart = view('client.showCart', compact('cart'))->render();
            return response()->json(['showCart' => $showCart, 'code' => 200], 200);
        }
    }


}

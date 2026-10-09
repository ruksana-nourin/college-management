<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {

        // $mobiles= Product::select('id', 'name', 'price', 'image', 'quantity')
        //         ->where('category_id',1)
        //         ->where('active',1)
        //         ->orderBy('id','desc')
        //         ->limit(5)
        //         ->get();

        // $watches= Product::select('id', 'name', 'price', 'image', 'quantity')
        //         ->where('category_id',2)
        //         ->where('active',1)
        //         ->orderBy('id','desc')
        //         ->limit(5)
        //         ->get();
        // $cameras= Product::select('id', 'name', 'price', 'image', 'quantity')
        //         ->where('category_id',3)
        //         ->where('active',1)
        //         ->orderBy('id','desc')
        //         ->limit(5)
        //         ->get();
        // $accessories= Product::select('id', 'name', 'price', 'image', 'quantity')
        //         ->where('category_id',4)
        //         ->where('active',1)
        //         ->orderBy('id','desc')
        //         ->limit(5)
        //         ->get();
        // $speakers= Product::select('id', 'name', 'price', 'image', 'quantity')
        //         ->where('category_id',5)
        //         ->where('active',1)
        //         ->orderBy('id','desc')
        //         ->limit(5)
        //         ->get();

        $mobiles = $this->latestProduct(1);
        $watches = $this->latestProduct(2);
        $cameras = $this->latestProduct(3);
        $accessories = $this->latestProduct(4);
        $speakers = $this->latestProduct(5);

        return view('site.pages.home', compact('mobiles', 'watches', 'cameras', 'accessories', 'speakers'));
    }

    public function latestProduct($_category_id)
    {
        $products = Product::select('id', 'name', 'price', 'image', 'quantity')
            ->where('category_id', $_category_id)
            ->where('active', 1)
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();

        return $products;
    }
    public function details($id){
        $product = Product::findOrFail($id);
        return view('site.pages.product-details', compact('product'));

    }
    public function cart(){
        // $product = Product::findOrFail($id);
        return view('site.pages.cart');

    }
}

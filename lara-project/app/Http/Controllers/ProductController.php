<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Services\UploadImgService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = Product::all();
        // $products = Product::from('products as p')
        //                     ->join('categories as c', 'p.category_id', '=', 'c.id')
        //                     ->join('brands as b', 'p.brand_id', '=', 'b.id')
        //                     ->select('p.*', 'c.name as category_name', 'b.name as brand_name')
        //                     ->get();

        $products = Product::with('category', 'brand')->orderBy('id', 'desc')->get();
        // dd($products->first()->category->name);
        return view('admin.pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::orderBy('name', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();

        return view('admin.pages.product.create',compact('brands','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|min:3|max:50',
            'price' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'reorder_level' => 'required',
            

        //for multiple file
            // 'image' => 'required|array',
            // 'image*' => 'image| mimes:jpeg,png,jpg,svg|max:2048',
            'image' => 'image| mimes:jpeg,png,jpg,svg|max:1024',
        ],[
            'image.max'=> 'Image is too large! Must be less then 1024kb.'
        ]
        
        );
        if($request->hasFile('image')){
            // dd('image found');
            // $imgName= time(). '.' . $request->image->extension();
            // dd($request->image->extension());
            // $request->image->move(public_path('uploads'), $imgName );
            $imgName = UploadImgService::upload($request->image, 'uploads/products');

            Product::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'reorder_level' => $request->reorder_level,
                'description' => $request->description,
                'active' => $request->active ? 1:0 ,
                // 'image' => "uploads/". $imgName,
                'image' => $imgName,
            ]);
            return redirect()->route('products.index')
            ->with('success', 'Product created successfully');
        }else{
            // dd('No Image');

            Product::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'reorder_level' => $request->reorder_level,
                'description' => $request->description,
                'active' => $request->active ? 1:0 
            ]);
            return redirect()->route('products.index')->with('success', 'Product created successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // dd($product);
        // dd($product->image);
        if($product->image){
            unlink(public_path($product->image));
        }
        Product::destroy($product->id);
        return redirect()->route('products.index')
        ->with('success','Product deleted Successfully.');

    }
}

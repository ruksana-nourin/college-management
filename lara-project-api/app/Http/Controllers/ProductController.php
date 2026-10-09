<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Services\UploadImgService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $products = Product::all();
        // $products = Product::from('products as p')
        //                     ->join('categories as c', 'p.category_id', '=', 'c.id')
        //                     ->join('brands as b', 'p.brand_id', '=', 'b.id')
        //                     ->select('p.*', 'c.name as category_name', 'b.name as brand_name')
        //                     ->get();
        // if($request->search . $request->category . $request->brand){
        //     dd($request->search ." ". $request->category." ".$request->brand);
        // }
        // if($request->category){
        //     dd($request->category);
        // }
        // if($request->brand){
        //     dd($request->brand);
        // }
        $query= Product::query();
        if($request->search){
            $query->where('name', 'like',"%{$request->search}%");
        }
        if($request->category){
            $query->where('category_id',$request->category);
        }
        if($request->brand){
            $query->where('brand_id',$request->brand);
        }
        $products = $query->with('category', 'brand')->orderBy('id', 'desc')->paginate(10);




        $categories = Category::orderBy('name', 'asc')->get();
        $brands = Brand::orderBy('name', 'asc')->get();
        // $products = Product::with('category', 'brand')->orderBy('id', 'desc')->paginate(10);

        // dd($products->first()->category->name);
        return view('admin.pages.product.index', compact('products','categories',
            'brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::orderBy('name', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();

        return view('admin.pages.product.create', compact('brands', 'categories'));
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

            // for multiple file
            // 'image' => 'required|array',
            // 'image*' => 'image| mimes:jpeg,png,jpg,svg|max:2048',
            'image' => 'image| mimes:jpeg,png,jpg,svg|max:1024',
        ], [
            'image.max' => 'Image is too large! Must be less then 1024kb.',
        ]

        );
        if ($request->hasFile('image')) {
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
                'active' => $request->active ? 1 : 0,
                // 'image' => "uploads/". $imgName,
                'image' => $imgName,
            ]);

            return redirect()->route('products.index')
                ->with('success', 'Product created successfully');
        } else {
            // dd('No Image');

            Product::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'reorder_level' => $request->reorder_level,
                'description' => $request->description,
                'active' => $request->active ? 1 : 0,
            ]);

            return redirect()->route('products.index')->with('success', 'Product created successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.pages.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.pages.product.edit', compact(
            'product',
            'categories',
            'brands'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'reorder_level' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Checkbox handling
        $validated['active'] = $request->has('active');

        // If a new image is uploaded
        if ($request->hasFile('image')) {

            // Delete old image
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            // Store new image
            $validated['image'] = $request->file('image')->store(
                'products',
                'public'
            );
        }

        $product->update($validated);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // dd($product);
        // dd($product->image);
        if ($product->image) {
            unlink(public_path($product->image));
        }
        Product::destroy($product->id);

        return redirect()->route('products.index')
            ->with('success', 'Product deleted Successfully.');

    }
}

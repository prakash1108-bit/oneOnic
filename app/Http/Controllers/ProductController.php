<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::with('subcategory')->get();
        return view('products.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subcategories = Subcategory::get();
        return view('products.create', compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subcategory_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required'
        ]);
        $subcategory = Subcategory::with('category')->find($request->subcategory_id);

        $data = $request->all();

        $data['category_id'] = $subcategory->category->id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('upload'), $imageName);
            $data['image'] = $imageName;
        }
        Product::create($data);
        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $subcategory = Subcategory::get();
        return view('products.edit', compact('subcategory', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subcategory_id' => 'required',
            'price' => 'required'
        ]);
        $subcategory = Subcategory::with('category')->find($request->subcategory_id);

        $data = $request->all();

        $data['category_id'] = $subcategory->category->id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('upload'), $imageName);
            $data['image'] = $imageName;
        }
        Product::find($id)->update($data);
        return redirect()->route('product.index')->with('success', 'Subcategory updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Subcategory deleted successfully.');
    }

    public function getProducts(Request $request)
    {
        $price = $request->input('price');
        $product = Product::where('price', '<=', $price)->get();
        $html = view('product_list', compact('product'))->render();
        return response()->json(['success' => true, 'data' => $html]);
    }
    public function searchPostByName(Request $request)
    {
        $name = $request->input('search');
        $product = Product::where('name', 'like', '%' . $name . '%')->get();
        $html = view('product_list',compact('product'))->render();
        return response()->json(['success'=>true,'data'=>$html]);   
    }
}

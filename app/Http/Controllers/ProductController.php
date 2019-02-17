<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\Http\Resources\Product as ProductResource;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get products
        // $products = Product::paginate(15);
        $products = Product::orderBy('created_at','desc')->paginate(5);

        // Return collection of products as a resource
        return ProductResource::collection($products);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Add new product
        $product = $request->isMethod('put') ? Product::findOrFail
        ($request->product_id) : new Product;

        $product->id = $request->input('product_id');
        $product->name = $request->input('name');
        $product->size = $request->input('size');
        $product->color = $request->input('color');
        $product->brand = $request->input('brand');

        // Return created product
        if($product->save()) {
            return new ProductResource($product);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get single product by id
        $product = Product::findOrFail($id);

        // Return single product as a resource
        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get single product by id
        $product = Product::findOrFail($id);

        // Return deleted product
        if($product->delete()){
            return new ProductResource($product);
        }
        // Return single product as a resource
    }
}

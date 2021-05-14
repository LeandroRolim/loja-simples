<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    public function store(ProductRequest $request)
    {
        $photo = $request->file('photo')->store('products', 'public');
        return new ProductResource(Product::create(['photo' => $photo] + $request->all()));
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->update($request->except('photo'));
        return ProductResource::make($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response('', 204);
    }
}

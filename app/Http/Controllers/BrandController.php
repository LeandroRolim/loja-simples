<?php

namespace App\Http\Controllers;

use App\Http\Resources\BrandResource;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return BrandResource::collection(Brand::all());
    }

    /**
     * @param  Brand  $brand
     * @return BrandResource
     */
    public function show(Brand $brand)
    {
        return new BrandResource($brand);
    }
    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        return new BrandResource(Brand::create($request->only('name')));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Brand $brand)
    {
        $brand->update($request->only('brand'));
        return new BrandResource($brand);
    }
}

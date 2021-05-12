<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryController extends Controller
{
    /**
     * @param  Category  $category
     * @return AnonymousResourceCollection
     */
    public function index(Category $category)
    {
        return CategoryResource::collection($category->all());
    }

    /**
     * @param  CategoryRequest  $request
     * @param  Category  $category
     */
    public function store(CategoryRequest $request, Category $category)
    {
        $category->fill($request->all())->save();
        return $category;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;

class StatsController extends Controller
{
    public function __invoke()
    {
        return [
            [
                'title' => __('Categories'),
                'total' => Category::count(),
            ],
        ];
    }
}

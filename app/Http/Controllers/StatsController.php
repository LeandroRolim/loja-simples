<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\User;

class StatsController extends Controller
{
    public function __invoke()
    {
        return [
            [
                'title' => __('messages.categories'),
                'total' => Category::count(),
            ],
            [
                'title' => __('messages.brands'),
                'total' => Brand::count(),
            ],
            [
                'title' => __('messages.products'),
                'total' => Product::count(),
            ],
            [
                'title' => __('messages.coupons'),
                'total' => Coupon::count(),
            ],
            [
                'title' => __('messages.users'),
                'total' => User::count(),
            ],
        ];
    }
}

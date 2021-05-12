<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;

class StatsController extends Controller
{
    public function __invoke()
    {
        return [
            [
                'title' => __('Categories'),
                'total' => Category::count(),
            ],
            [
                'title' => __('Users'),
                'total' => User::count(),
            ],
        ];
    }
}

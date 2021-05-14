<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouponRequest;
use App\Http\Resources\CouponResource;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request, Coupon $coupon)
    {
        if ($request->has('code')) {
            $coupon = $coupon->where('code', $request->query('code'));
        }
        return CouponResource::collection($coupon->get());
    }


    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(CouponRequest $request)
    {
        return CouponResource::make(Coupon::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Coupon $coupon)
    {
        return CouponResource::make($coupon);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Coupon $coupon)
    {
        $coupon->update($request->except(['code']));
        return CouponResource::make($coupon);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return response('', 204);
    }
}

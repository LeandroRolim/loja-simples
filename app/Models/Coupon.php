<?php

namespace App\Models;

use Database\Factories\CouponFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Coupon
 *
 * @property int $id
 * @property string $value
 * @property bool $is_percentage
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static CouponFactory factory(...$parameters)
 * @method static Builder|Coupon newModelQuery()
 * @method static Builder|Coupon newQuery()
 * @method static Builder|Coupon query()
 * @method static Builder|Coupon whereCreatedAt($value)
 * @method static Builder|Coupon whereId($value)
 * @method static Builder|Coupon whereIsPercentage($value)
 * @method static Builder|Coupon whereUpdatedAt($value)
 * @method static Builder|Coupon whereValue($value)
 * @mixin Eloquent
 */
class Coupon extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'code',
        'value',
        'is_percentage',
    ];

    protected $casts = [
        'is_percentage' => 'boolean',
    ];
}

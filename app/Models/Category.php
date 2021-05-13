<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $slug
 * @property string $category
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static CategoryFactory factory(...$parameters)
 * @method static Builder|Category newModelQuery()
 * @method static Builder|Category newQuery()
 * @method static Builder|Category query()
 * @method static Builder|Category whereCategory($value)
 * @method static Builder|Category whereCreatedAt($value)
 * @method static Builder|Category whereId($value)
 * @method static Builder|Category whereSlug($value)
 * @method static Builder|Category whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read Collection|Product[] $products
 * @property-read int|null $products_count
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'category',
    ];

    /**
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class FavoriteCategory
 * @package App\Models
 *
 * @property int $favorite_id
 * @property int $category_id
 * @property string $created_at
 * @property Category $category
 */
class FavoriteCategory extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

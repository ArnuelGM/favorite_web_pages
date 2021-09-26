<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * Class Favorite
 * @package App\Models
 * @property int $id
 * @property string $title
 * @property string $url
 * @property string $description
 * @property bool $visibility
 * @property int $user_id
 *
 * @property-read string $visibilityLabel
 *
 * @property Collection $categoriesRelated
 */
class Favorite extends Model
{
    use HasFactory;

    /**
     * @return string
     */
    public function getVisibilityLabelAttribute()
    {
        return (bool)$this->visibility ? 'Publico' : 'Privado';
    }

    /**
     * @return bool
     */
    public function isPublic(): bool
    {
        return $this->visibility == 1;
    }

    /**
     * @return bool
     */
    public function isPrivate(): bool
    {
        return $this->visibility == 0;
    }

    /**
     * @return HasMany
     */
    public function categoriesRelated(): HasMany
    {
        return $this->hasMany(FavoriteCategory::class);
    }
}

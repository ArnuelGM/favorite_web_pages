<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App\Models
 *
 * @property string id
 * @property string user_id
 * @property string name
 *
 */
class Category extends Model
{
    use HasFactory;

    /**
     * mutador para poner la primera letra en mayúscula
     * @param string $name
     */
    public function setNameAttribute(string $name)
    {
        $this->attributes['name'] = ucwords(strtolower($name));
    }
}

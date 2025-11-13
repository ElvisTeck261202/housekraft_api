<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Budget;
use App\Models\PropertyImage;

class Property extends Model
{
    use Uuid;
    use SoftDeletes;

    protected $table = 'properties';

    protected $fillable = [
        'name',
        'description',
        'base_price'
    ];

    protected $hidden = [
        'id'
    ];

    public function budgets(): HasMany
    {
        return $this->hasMany(Budget::class, 'property_uuid', 'uuid');
    }

    public function property_images(): HasMany
    {
        return $this->hasMany(PropertyImage::class, 'property_uuid', 'uuid');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Budget;
use App\Models\PropertyImage;

class Property extends Model
{
    use HasUuids;
    use SoftDeletes;

    protected $table = 'properties';

    protected $fillable = [
        'id',
        'name',
        'description',
        'base_price'
    ];

    protected $hidden = [
        'id'
    ];

    public function budgets(): HasMany
    {
        return $this->hasMany(Budget::class, 'property_id', 'id');
    }

    public function property_images(): HasMany
    {
        return $this->hasMany(PropertyImage::class, 'property_id', 'id');
    }
}

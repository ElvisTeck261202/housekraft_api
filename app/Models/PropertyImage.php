<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Property;

class PropertyImage extends Model
{
    use HasUuids;
    use SoftDeletes;

    protected $table = 'property_images';

    protected $fillable = [
        'id',
        'image_url',
        'property_id'
    ];

    protected $hidden = [
        'id'
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class, 'property_id', 'id');
    }
}

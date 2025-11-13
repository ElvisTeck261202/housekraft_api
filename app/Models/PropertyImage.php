<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Property;

class PropertyImage extends Model
{
    use Uuid;
    use SoftDeletes;

    protected $table = 'property_images';

    protected $fillable = [
        'image_url',
        'property_uuid'
    ];

    protected $hidden = [
        'id'
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class, 'property_uuid', 'uuid');
    }
}

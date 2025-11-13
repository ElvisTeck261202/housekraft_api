<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Builder;
use App\Models\Item;

class BuilderSkill extends Model
{
    use Uuid;
    use SoftDeletes;

    protected $table = 'builder_skills';

    protected $fillable = [
        'builder_uuid',
        'item_uuid',
        'work_cost',
        'estimated_time'
    ];

    protected $hidden = [
        'id'
    ];

    public function builder(): BelongsTo
    {
        return $this->belongsTo(Builder::class, 'builder_uuid', 'uuid');
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_uuid', 'uuid');
    }
}

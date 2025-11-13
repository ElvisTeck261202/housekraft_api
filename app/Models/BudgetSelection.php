<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Budget;
use App\Models\Builder;
use App\Models\Item;

class BudgetSelection extends Model
{
    use Uuid;
    use SoftDeletes;

    protected $table = 'budget_selections';

    protected $fillable = [
        'budget_uuid',
        'item_uuid',
        'builder_uuid',
        'item_cost_snapshot',
        'builder_cost_snapshot'
    ];

    protected $hidden = [
        'id'
    ];

    public function budget(): BelongsTo
    {
        return $this->belongsTo(Budget::class, 'budget_uuid', 'uuid');
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_uuid', 'uuid');
    }

    public function builder(): BelongsTo
    {
        return $this->belongsTo(Builder::class, 'builder_uuid', 'uuid');
    }
}

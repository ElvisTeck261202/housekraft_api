<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Budget;
use App\Models\Builder;
use App\Models\Item;

class BudgetSelection extends Model
{
    use HasUuids;
    use SoftDeletes;

    protected $table = 'budget_selections';

    protected $fillable = [
        'budget_id',
        'item_id',
        'builder_id',
        'item_cost_snapshot',
        'builder_cost_snapshot'
    ];

    protected $hidden = [
        'id'
    ];

    public function budget(): BelongsTo
    {
        return $this->belongsTo(Budget::class, 'budget_id', 'id');
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    public function builder(): BelongsTo
    {
        return $this->belongsTo(Builder::class, 'builder_id', 'id');
    }
}

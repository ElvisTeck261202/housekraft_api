<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\BudgetSelection;
use App\Models\BuilderSkill;

class Item extends Model
{
    use HasUuids;
    use SoftDeletes;

    protected $table = 'items';

    protected $fillable = [
        'id',
        'name',
        'description',
        'cost',
        'image_url'
    ];

    protected $hidden = [
        'id'
    ];

    public function budget_selections(): HasMany
    {
        return $this->hasMany(BudgetSelection::class, 'item_id', 'id');
    }

    public function builder_skills(): HasMany
    {
        return $this->hasMany(BuilderSkill::class, 'item_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\BuilderSkill;
use App\Models\BudgetSelection;

class Builder extends Model
{
    use HasUuids;
    use SoftDeletes;

    protected $table = 'builders';

    protected $fillable = [
        'id',
        'name',
        'photo_url'
    ];

    protected $hidden = [
        'id'
    ];

    public function builder_skills(): HasMany
    {
        return $this->hasMany(BuilderSkill::class, 'builder_idd', 'id');
    }

    public function budget_selections(): HasMany
    {
        return $this->hasMany(BudgetSelection::class, 'builder_id', 'id');
    }
}

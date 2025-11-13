<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\BuilderSkill;
use App\Models\BudgetSelection;

class Builder extends Model
{
    use Uuid;
    use SoftDeletes;

    protected $table = 'builders';

    protected $fillable = [
        'name',
        'photo_url'
    ];

    protected $hidden = [
        'id'
    ];

    public function builder_skills(): HasMany
    {
        return $this->hasMany(BuilderSkill::class, 'builder_uuid', 'uuid');
    }

    public function budget_selections(): HasMany
    {
        return $this->hasMany(BudgetSelection::class, 'builder_uuid', 'uuid');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Budget;

class Client extends Model
{
    use Uuid;
    use SoftDeletes;

    protected $table = 'clients';

    protected $fillable = [
        'name',
        'email',
        'phone'
    ];

    protected $hidden = [
        'id'
    ];

    public function budgets(): HasMany
    {
        return $this->hasMany(Budget::class, 'client_uuid', 'uuid');
    }
}

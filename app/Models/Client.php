<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Budget;

class Client extends Model
{
    use HasUuids;
    use SoftDeletes;

    protected $table = 'clients';

    protected $fillable = [
        'id',
        'name',
        'email',
        'phone'
    ];

    protected $hidden = [
        'id'
    ];

    public function budgets(): HasMany
    {
        return $this->hasMany(Budget::class, 'client_id', 'id');
    }
}

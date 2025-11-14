<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Client;
use App\Models\user;
use App\Models\Property;

class Budget extends Model
{
    use HasUuids;
    use SoftDeletes;

    protected $table = 'budgets';

    protected $fillable = [
        'id',
        'client_id',
        'user_id',
        'property_id',
        'total_amount',
        'status'
    ];

    protected $hidden = [
        'id'
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class, 'property_id', 'id');
    }
}

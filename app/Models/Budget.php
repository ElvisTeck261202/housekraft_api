<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Client;
use App\Models\user;
use App\Models\Property;

class Budget extends Model
{
    use Uuid;
    use SoftDeletes;

    protected $table = 'budgets';

    protected $fillable = [
        'client_uuid',
        'user_uuid',
        'property_uuid',
        'total_amount',
        'status'
    ];

    protected $hidden = [
        'id'
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_uuid', 'uuid');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_uuid', 'uuid');
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class, 'property_uuid', 'uuid');
    }
}

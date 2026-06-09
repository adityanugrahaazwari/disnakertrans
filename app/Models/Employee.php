<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    protected $fillable = [
        'parent_id',
        'name',
        'nip',
        'position',
        'photo',
        'order',
    ];

    /**
     * Get the parent position/employee.
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'parent_id');
    }

    /**
     * Get the subordinates/children positions.
     */
    public function children(): HasMany
    {
        return $this->hasMany(Employee::class, 'parent_id')->orderBy('order');
    }
}

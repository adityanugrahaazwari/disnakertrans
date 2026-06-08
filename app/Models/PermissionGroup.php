<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Permission\Models\Permission;

class PermissionGroup extends Model
{
    protected $fillable = ['name', 'description', 'order'];

    public function permissions(): HasMany
    {
        return $this->hasMany(Permission::class);
    }
}

<?php

namespace App\Models\UsersManagement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\UsersManagement\UserRoleCountry;


class UserRole extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function countries(): HasMany
    {
        return $this->hasMany(UserRoleCountry::class);
    }
}

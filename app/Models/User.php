<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\UsersManagement\UserRole;
use App\Models\UsersManagement\UserRoleCountry;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    // protected $connection = 'sqlsrv';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_role_id',
        'display_name',
        'given_name',
        'job_title',
        'mobile',
        'office_location',
        'preferred_language',
        'sur_name',
        'country',
        'department'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
 
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role():BelongsTo{
        return $this->belongsTo(UserRole::class,'user_role_id');
    }
    public function countries() : HasMany{
        return $this->hasMany(UserRoleCountry::class,'user_role_id','user_role_id');
    }
}

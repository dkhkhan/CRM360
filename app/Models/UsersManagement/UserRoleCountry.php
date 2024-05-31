<?php

namespace App\Models\usersManagement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\UsersManagement\UserCountry;

class UserRoleCountry extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_country_id',
        'user_role_id',
        'created_at',
        'updated_at'
    ];

    public function getCountryName($countryid){
        $country = UserCountry::findOrFail($countryid);
        
        return $country ? $country->country_name : '-';
    }

    public function country() : BelongsTo{
        return $this->belongsTo(UserCountry::class,'user_country_id');
    } 
}

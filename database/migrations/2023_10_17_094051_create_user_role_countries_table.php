<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\UsersManagement\UserCountry;
use App\Models\UsersManagement\UserRole;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_role_countries', function (Blueprint $table) {
            $table->id();
            $table->id();$table->foreignIdFor(UserRole::class)->nullable();
            $table->foreignIdFor(UserCountry::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_role_countries');
    }
};

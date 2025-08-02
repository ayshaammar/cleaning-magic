<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileFieldsToUsersTable extends Migration
{
   public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('date_of_birth')->nullable()->after('email');
            $table->string('national_id')->nullable()->after('date_of_birth');
            $table->string('address_country')->nullable()->after('national_id');
            $table->string('address_province')->nullable()->after('address_country');
            $table->string('address_city')->nullable()->after('address_province');
            $table->string('address_near_landmark')->nullable()->after('address_city');
            $table->string('mastercard_number')->nullable()->after('address_near_landmark');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'date_of_birth',
                'national_id',
                'address_country',
                'address_province',
                'address_city',
                'address_near_landmark',
                'mastercard_number',
            ]);
        });
    
    }
}

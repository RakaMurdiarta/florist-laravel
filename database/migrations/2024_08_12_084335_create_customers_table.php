<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
require_once __DIR__ .'/../Utils/TimestampHelper.php';


return new class extends Migration
{
    protected $connection = 'pgsql';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('phone_number',20)->nullable(false);
            $table->string('username',100)->nullable(true);
            $table->text('avatar')->nullable(true);
            $table->text('password_hash')->nullable(false);
            $table->boolean('is_verified')->default(false);
            $table->timestampTz('last_login')->nullable(true);
            $table->timestampTz('register_at')->nullable(false);
            customTimestampTz($table);

            $table->foreignUuid("lang_id")->constrained("languages","id","foreign_customers_to_languages")->onDelete("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }

    private function customTimestampTz(Blueprint $table)
    {
        $table->timestampTz("created_at")->nullable(false)->useCurrent();
        $table->timestampTz("updated_at")->nullable(false)->useCurrent();
    }
};

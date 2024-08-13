<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
require_once __DIR__ .'/../Utils/TimestampHelper.php';

return new class extends Migration
{
    protected $connection = 'pgsql';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string('name',100)->nullable(false)->unique();
            $table->string('code',100)->nullable(false);
            customTimestampTz($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages');
    }

    private function customTimestampTz(Blueprint $table)
    {
        $table->timestampTz("created_at")->nullable(false)->useCurrent();
        $table->timestampTz("updated_at")->nullable(false)->useCurrent();
    }
};

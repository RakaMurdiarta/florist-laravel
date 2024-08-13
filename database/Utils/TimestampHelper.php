<?php

use Illuminate\Database\Schema\Blueprint;

function customTimestampTz(Blueprint $table){
    $table->timestampTz("created_at")->nullable(false)->useCurrent();
    $table->timestampTz("updated_at")->nullable(false)->useCurrent();
}
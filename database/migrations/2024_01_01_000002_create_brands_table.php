<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('brand_name');
            $table->string('brandlogo_image')->nullable();
            $table->date('brand_establishment_date');
            $table->string('brand_manufacture_country');
            $table->timestamps();
        });
    }
};
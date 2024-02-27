<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code',100);
            $table->string('name',255);
            $table->string('uom',100);
            $table->string('asset_type',100);
            $table->string('itemCat1Code', 255)->nullable();
            $table->string('itemCat2Code', 255)->nullable();
            $table->string('itemCat3Code', 255)->nullable();
            $table->string('itemCat7Code', 255)->nullable();
            $table->string('brand_code', 255)->nullable();
            $table->string('ean', 100)->nullable();
            $table->string('access_level', 30)->nullable()->default('LGH Default');
            $table->boolean('is_active')->nullable()->default(true);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
 
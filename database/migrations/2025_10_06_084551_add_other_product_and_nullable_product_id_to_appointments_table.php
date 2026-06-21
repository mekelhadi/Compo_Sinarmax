<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            if (!Schema::hasColumn('appointments', 'other_product')) {
                $table->string('other_product')->nullable()->after('product_id');
            }
            if (Schema::hasColumn('appointments', 'product_id')) {
                $table->unsignedBigInteger('product_id')->nullable()->change();
            }
        });
    }

    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            if (Schema::hasColumn('appointments', 'other_product')) {
                $table->dropColumn('other_product');
            }
            if (Schema::hasColumn('appointments', 'product_id')) {
                $table->unsignedBigInteger('product_id')->nullable(false)->change();
            }
        });
    }
};
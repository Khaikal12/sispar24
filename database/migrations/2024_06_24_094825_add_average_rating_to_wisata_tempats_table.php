<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('wisata_tempats', function (Blueprint $table) {
            $table->decimal('average_rating', 3, 2)->default(0.00)->after('tgl_upload');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wisata_tempats', function (Blueprint $table) {
            $table->dropColumn('average_rating');
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::table('posts', function (Blueprint $table) {
        if (!Schema::hasColumn('posts', 'featured_image')) {
            $table->string('featured_image')->nullable()->after('slug');
        }

        if (!Schema::hasColumn('posts', 'show_sidebar')) {
            $table->boolean('show_sidebar')->default(true)->after('featured_image');
        }
    });
}


    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['slug', 'featured_image', 'show_sidebar']);
        });
    }
};

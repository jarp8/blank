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
        Schema::create('menu_main_menus', function (Blueprint $table) {
            $table->id();

            $table->string('text');
            $table->string('url')->nullable();
            $table->string('icon')->nullable();
            $table->integer('menu_position');
            
            $table->foreignId('menu_main_menu_id')->nullable()->constrained();
            $table->foreignId('menu_viewname_id')->nullable()->constrained();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_main_menus');
    }
};

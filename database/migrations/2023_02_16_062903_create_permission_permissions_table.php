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
        Schema::create('permission_permissions', function (Blueprint $table) {
            $table->id();

            $table->string('relation')->nullable();

            $table->foreignId('permission_module_id')->constrained();
            $table->foreignId('permission_function_id')->constrained();

            $table->unique(['permission_module_id', 'permission_function_id'], 'permissions_permission_module_id_permission_function_id_unique');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permission_permissions');
    }
};

<?php

namespace dmitryrogolev\Slug\Tests\Database\Migrations;

use dmitryrogolev\Slug\Facades\Slug;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Запустить миграцию.
     *
     * @return void
     */
    public function up(): void
    {
        if (! Schema::hasTable('items')) {
            Schema::create('items', function (Blueprint $table) {
                $table->id();
                $table->string(Slug::default());
                $table->timestamps();
            });
        }
    }

    /**
     * Откатить миграцию.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
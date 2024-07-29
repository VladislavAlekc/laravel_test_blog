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
        Schema::create('donates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('currency_id');
            $table->foreign('currency_id')->references('id')->on('currencies'); // связь колонки currency_id с id таблицы currencies
            $table->decimal('amount')->unsigned(); // для точной работы с валютой, не может быть отрицательной (50.00) 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donates');
    }
};

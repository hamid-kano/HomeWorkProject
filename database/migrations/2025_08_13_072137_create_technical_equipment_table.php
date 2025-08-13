<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('technical_equipment', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('model');
            $table->string('serial_number')->unique();
            $table->date('purchase_date');
            $table->date('warranty_date')->nullable();
            $table->enum('status', ['يعمل', 'صيانة', 'معطل', 'مستبعد'])->default('يعمل');
            $table->string('location');
            $table->decimal('cost', 12, 2);
            $table->string('supplier');
            $table->string('maintenance_schedule')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('technical_equipment');
    }
};
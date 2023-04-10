<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->string('code', 4);
            $table->string('name', 35);
            $table->timestamps();
        });

        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('code', 3)->unique();
            $table->string('fantasy', 40)->nullable();
            $table->string('business_name', 40);
            $table->string('address', 50)->nullable();
            $table->string('postcode', 8)->nullable();
            $table->string('locality', 40)->nullable();
            $table->foreignId('province_id')->constrained();
            $table->string('country', 40)->nullable()->default('Argentina');
            $table->string('phone1', 18)->nullable();
            $table->string('phone2', 18)->nullable();
            $table->string('email', 128)->nullable();
            $table->enum('acc_type', ['C', 'A'])->default('C');
            $table->string('acc_number', 15)->nullable();
            $table->string('cuit', 13)->nullable();
            $table->foreignId('iva_type_id')->constrained();
            $table->enum('inv_type', ['A', 'B', 'C'])->default('A');
            $table->string('contact', 30)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('providers');
        Schema::dropIfExists('provinces');
    }
};

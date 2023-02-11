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
        Schema::create('doc_types', function (Blueprint $table) {
            $table->id();
            $table->string('code', 2);
            $table->string('descrip', 25);
            $table->timestamps();
        });

        Schema::create('iva_types', function (Blueprint $table) {
            $table->id();
            $table->string('code', 2);
            $table->string('descrip', 30);
            $table->timestamps();
        });

        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('code', 4)->unique();
            $table->string('business_name', 40);
            $table->string('address', 50)->nullable();
            $table->string('postcode', 8)->nullable();
            $table->string('locality', 40)->nullable();
            $table->string('mobile', 14)->nullable();
            $table->string('phone', 14)->nullable();
            $table->string('email', 128)->nullable();
            $table->foreignId('doc_type_id')->constrained()->default(35);
            $table->string('cuit', 13)->nullable();
            $table->foreignId('iva_type_id')->constrained()->default(5);
            $table->enum('inv_type', ['A', 'B', 'M'])->default('B');
            $table->enum('status', ['A', 'S']);
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
        Schema::dropIfExists('clients');
        Schema::dropIfExists('iva_types');
        Schema::dropIfExists('doc_types');
    }
};

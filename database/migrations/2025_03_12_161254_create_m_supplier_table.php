<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('m_supplier', function (Blueprint $table) {
            $table->id('supplier_id'); // INT (Auto Increment, Primary Key)
            $table->string('supplier_kode', 255); // VARCHAR(255) lebih cocok daripada INT
            $table->string('supplier_nama', 255); // VARCHAR(255) lebih cocok daripada TEXT
            $table->string('supplier_alamat', 255); // VARCHAR(255) lebih cocok daripada INT
            $table->timestamps(); // Menambahkan created_at & updated_at otomatis
        });
    }

    public function down()
    {
        Schema::dropIfExists('m_supplier');
    }
};
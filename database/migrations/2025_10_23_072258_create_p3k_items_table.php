<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('p3k_items', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->integer('standar_kotak')->default(0);
            $table->string('satuan', 50)->nullable();
            
            // Pemakaian bulanan
            $table->integer('pemakaian_januari')->default(0);
            $table->integer('pemakaian_februari')->default(0);
            $table->integer('pemakaian_maret')->default(0);
            $table->integer('pemakaian_april')->default(0);
            $table->integer('pemakaian_mei')->default(0);
            $table->integer('pemakaian_juni')->default(0);
            $table->integer('pemakaian_juli')->default(0);
            $table->integer('pemakaian_agustus')->default(0);
            $table->integer('pemakaian_september')->default(0);
            $table->integer('pemakaian_oktober')->default(0);
            $table->integer('pemakaian_november')->default(0);
            $table->integer('pemakaian_desember')->default(0);

            // Stok & kebutuhan
            $table->integer('stok_akhir')->default(0);
            $table->integer('minimal_stok')->default(0);
            $table->integer('harus_diadakan')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('p3k_items');
    }
};

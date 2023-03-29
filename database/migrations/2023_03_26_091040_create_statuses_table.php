<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('code');
            $table->string('status'); 
            $table->timestamps();
        });

        DB::table('statuses')->insert([
            ['code' => '1', 'status' => 'Active'],
            ['code' => '2', 'status' => 'Menunggu Pengesahan'],
            ['code' => '3', 'status' => 'Sedang Dipinjam'],
            ['code' => '4', 'status' => 'Telah Dibalkan'],
            ['code' => '5', 'status' => 'Telah Selesai'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statuses');
    }
};

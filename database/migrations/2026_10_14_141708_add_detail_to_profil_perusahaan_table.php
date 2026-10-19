<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profil_perusahaan', function (Blueprint $table) {
            $table->string('judul_kartu_1')->nullable();
            $table->text('deskripsi_kartu_1')->nullable();

            $table->string('judul_kartu_2')->nullable();
            $table->text('deskripsi_kartu_2')->nullable();

            $table->string('judul_kartu_3')->nullable();
            $table->text('deskripsi_kartu_3')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('profil_perusahaan', function (Blueprint $table) {
            $table->dropColumn([
                'judul_kartu_1',
                'deskripsi_kartu_1',
                'judul_kartu_2',
                'deskripsi_kartu_2',
                'judul_kartu_3',
                'deskripsi_kartu_3',
            ]);
        });
    }
};

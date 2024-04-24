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
        Schema::create('kasir', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tempatLahir')->nullable();
            $table->date('tanggalLahir')->nullable();
            $table->enum('jenisKelamin', array('Laki-Laki', 'Perempuan'))->nullable();
            $table->enum('agama', array('Islam', 'Protestan', 'Katolik', 'Hindu', 'Buddha', 'Kong Hu Cu', 'Lainmya'))->nullable();
            $table->string('alamat')->nullable();
            $table->string('email')->nullable();
            $table->integer('noTelp')->nullable();
            $table->string('foto')->nullable();
            $table->string('username')->unique();
            $table->string('password');
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
        Schema::dropIfExists('kasir');
    }
};

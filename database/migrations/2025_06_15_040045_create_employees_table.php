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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 30)->nullable()->comment('Nomor Induk Kependudukan');
            $table->string('nip', 30)->nullable()->comment('Nomor Induk Pegawai');
            $table->string('nidn', 10)->nullable()->comment('Nomor Induk Dosen Nasional');
            $table->string('nuptk', 20)->nullable()->comment('Nomor Unik Pendidik dan Tenaga Kependidikan');
            $table->string('nama_lengkap', 100)->comment('Nama Lengkap');
            $table->enum('gender', ['L', 'P'])->comment('L = Laki-laki, P = Perempuan');
            $table->string('birth_place', 50)->nullable()->comment('Tempat Lahir');
            $table->date('birth_date')->nullable()->comment('Tanggal Lahir');
            $table->text('address')->nullable()->comment('Alamat');
            $table->string('district', 50)->nullable()->comment('Kecamatan');
            $table->string('city', 50)->nullable()->comment('Kota/Kabupaten');
            $table->string('province', 50)->nullable()->comment('Provinsi');
            $table->enum('employee_status', [
                'PNS',
                'PPPK',
                'CPNS',
                'CPPK',
                'Non ASN',
            ])->nullable()->comment('Status Kepegawaian');
            $table->enum('religion', [
                'Islam',
                'Kristen',
                'Katolik',
                'Hindu',
                'Buddha',
                'Konghucu'
            ])->nullable()->comment('Agama');
            $table->string('mobile_num', 50)->nullable()->comment('Nomor HP');
            $table->enum('status_pernikahan', [
                'Menikah',
                'Belum Menikah',
                'Duda',
                'Janda',
                'Data Tidak Diketahui',
            ])->nullable()->comment('Status Pernikahan');
            $table->boolean('status_sertifikasi')->default(false)->comment('Status Sertifikasi');
            $table->integer('nominal_sertifikasi_yg_diterima')->nullable()->comment('Nominal Sertifikasi yang Diterima');
            $table->boolean('status_remonerasi')->default(false)->comment('Status Remunerasi');
            $table->integer('nominal_remonerasi')->nullable()->comment('Nominal Remunerasi');
            $table->boolean('status_tukin')->default(false)->comment('Status Tunjangan Kinerja');
            $table->integer('nominal_tukin')->nullable()->comment('Nominal Tunjangan Kinerja');
            $table->boolean('status_selkin')->default(false)->comment('Status Seleksi Kinerja');
            $table->integer('nominal_selkin')->nullable()->comment('Nominal Seleksi Kinerja');
            $table->string('statistic_num', 80)->nullable()->comment('Nomor Statistik');
            $table->string('nama_institusi', 100)->nullable()->comment('Nama Institusi');
            $table->enum('institution_category', [
                'Universitas',
                'Institut',
                'Sekolah Tinggi'
            ])->nullable()->comment('Kategori Institusi');
            $table->date('tgl_data')->nullable()->comment('Data Historik Per Tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

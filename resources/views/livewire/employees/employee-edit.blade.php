<div>
    <section class="py-3 py-md-5 py-xl-8">
        <div class="container">
            <div class="row mb-2">
                <div class="col-12">
                    <h3 class="fs-5 mb-2 text-secondary text-uppercase">IAKN Palangka Raya</h3>
                    <h2 class="display-5">Aplikasi Data ASN Interkoneksi</h2>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                    <form wire:submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <button>Kembali</button>
                                <a wire:navigate href="{{ route('daftar') }}" class="btn btn-primary mb-3">Kembali</a>
                                <div class="input-group">
                                    <span class="input-group-text">ID :</span>
                                    <input type="text" class="form-control" value="{{ $employee->id }}" disabled>
                                </div>
                                <div class="form-text">ID tidak bisa dirubah</div>
                            </div>

                            <div class="col-6 mb-2">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="number" class="form-control" id="nik" wire:model="nik" required>
                            </div>

                            <div class="col-6 mb-2">
                                <label for="nip" class="form-label">NIP</label>
                                <input type="text" class="form-control" id="nip" wire:model="nip" required>
                            </div>

                            <div class="col-6 mb-2">
                                <label for="nidn" class="form-label">NIDN</label>
                                <input type="text" class="form-control" id="nidn" wire:model="nidn" required>
                            </div>

                            <div class="col-6 mb-2">
                                <label for="nuptk" class="form-label">NUPTK</label>
                                <input type="text" class="form-control" id="nuptk" wire:model="nuptk" required>
                            </div>

                            <div class="col-12 mb-2">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" wire:model="nama_lengkap" required>
                            </div>

                            <div class="col-4 mb-2">
                                <label for="gender" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="gender" wire:model="gender">
                                    <option disabled>== PILIH ==</option>
                                    <option value="L" {{ $employee->gender == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="P" {{ $employee->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>

                            <div class="col-4 mb-2">
                                <label for="birth_place" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" id="birth_place" wire:model="birth_place" required>
                            </div>
                            <div class="col-4 mb-2">
                                <label for="birth_place" class="form-label">Tgl Lahir</label>
                                <input type="date" class="form-control" id="birth_date" wire:model="birth_date" required>
                            </div>

                            <div class="col-12 mb-2">
                                <label for="address" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="address" wire:model="address" required>
                            </div>

                            <div class="col-12 mb-2">
                                <label for="district" class="form-label">Kecamatan</label>
                                <input type="text" class="form-control" id="district" wire:model="district" required>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="input-group">
                                    <span class="input-group-text">Kota / Kabupaten :</span>
                                    <input type="text" class="form-control" wire:model="city">
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="input-group">
                                    <span class="input-group-text">Provinsi :</span>
                                    <input type="text" class="form-control" wire:model="province">
                                </div>
                            </div>

                            <div class="col-4 mb-2">
                                <label for="employee_status" class="form-label">Status Pegawai</label>
                                <select id="employee_status" class="form-select" wire:model="employee_status">
                                    <option disabled>== PILIH ==</option>
                                    <option value="PNS" {{ $employee->employee_status == 'PNS' ? 'selected' : '' }}>PNS</option>
                                    <option value="PPPK" {{ $employee->employee_status == 'PPPK' ? 'selected' : '' }}>PPPK</option>
                                    <option value="CPNS" {{ $employee->employee_status == 'CPNS' ? 'selected' : '' }}>CPNS</option>
                                    <option value="CPPPK" {{ $employee->employee_status == 'CPPPK' ? 'selected' : '' }}>CPPPK</option>
                                    <option value="Non ASN" {{ $employee->employee_status == 'Non ASN' ? 'selected' : '' }}>Non ASN</option>
                                </select>
                            </div>

                            <div class="col-4 mb-2">
                                <label for="religion" class="form-label">Agama</label>
                                <select id="religion" class="form-select" wire:model="religion">
                                    <option selected>== PILIH ==</option>
                                    <option value="Islam" {{ $employee->religion == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Kristen" {{ $employee->religion == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                    <option value="Katolik" {{ $employee->religion == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                    <option value="Hindu" {{ $employee->religion == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Buddha" {{ $employee->religion == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                </select>
                            </div>

                            <div class="col-6 mb-2">
                                <label for="mobile_num" class="form-label">No HP</label>
                                <input type="text" class="form-control" id="mobile_num" wire:model="mobile_num" required>
                            </div>

                            <div class="col-6 mb-2">
                                <label for="status_pernikahan" class="form-label">Status Nikah</label>
                                <select id="status_pernikahan" class="form-select" wire:model="status_pernikahan">
                                    <option>== PILIH ==</option>
                                    <option value="Nikah" {{ $employee->status_pernikahan == 'Nikah' ? 'selected' : '' }}>Nikah</option>
                                    <option value="Belum Nikah" {{ $employee->status_pernikahan == 'Belum Nikah' ? 'selected' : '' }}>Belum Nikah</option>
                                    <option value="Duda" {{ $employee->status_pernikahan == 'Duda' ? 'selected' : '' }}>Duda</option>
                                    <option value="Janda" {{ $employee->status_pernikahan == 'Janda' ? 'selected' : '' }}>Janda</option>
                                </select>
                            </div>

                            <!-- SERTIFIKASI -->
                            <div class="col-12 mb-2">
                                <label class="form-label">Status Sertifikasi</label>
                                <select class="form-select" wire:model="status_sertifikasi">
                                    <option disabled>== Pilih ==</option>
                                    <option value="1" {{ $employee->status_sertifikasi == 1 ? 'selected' : '' }}>Sudah</option>
                                    <option value="0" {{ $employee->status_sertifikasi == 0 ? 'selected' : '' }}>Belum</option>
                                </select>
                            </div>

                            <div class="col-12 mb-2">
                                <label for="nominal_sertifikasi_yg_diterima" class="form-label">Nominal Sertifikasi</label>
                                <input type="number" class="form-control" id="nominal_sertifikasi_yg_diterima" wire:model="nominal_sertifikasi_yg_diterima">
                            </div>

                            <!-- REMONERASI -->
                            <div class="col-12 mb-2">
                                <label class="form-label">Status Remonerasi</label>
                                <select class="form-select" wire:model="status_remonerasi">
                                    <option disabled>== Pilih ==</option>
                                    <option value="1" {{ $employee->status_remonerasi == 1 ? 'selected' : '' }}>Sudah</option>
                                    <option value="0" {{ $employee->status_remonerasi == 0 ? 'selected' : '' }}>Belum</option>
                                </select>
                            </div>

                            <div class="col-12 mb-2">
                                <label for="nominal_remonerasi" class="form-label">Nominal Remonerasi</label>
                                <input type="number" class="form-control" id="nominal_remonerasi" wire:model="nominal_remonerasi" required>
                            </div>

                            <!-- TUKIN -->
                            <div class="col-12 mb-2">
                                <label class="form-label">Status Tukin</label>
                                <select class="form-select" wire:model="status_tukin">
                                    <option disabled>== Pilih ==</option>
                                    <option value="1" {{ $employee->status_tukin == 1 ? 'selected' : '' }}>Sudah</option>
                                    <option value="0" {{ $employee->status_tukin == 0 ? 'selected' : '' }}>Belum</option>
                                </select>
                            </div>

                            <div class="col-12 mb-2">
                                <label for="nominal_tukin" class="form-label">Nominal Tukin</label>
                                <input type="number" class="form-control" id="nominal_tukin" wire:model="nominal_tukin" required>
                            </div>

                            <!-- SELKIN -->
                            <div class="col-12 mb-2">
                                <label class="form-label">Status Selisih Tukin</label>
                                <select class="form-select" wire:model="status_selkin">
                                    <option selected>== Pilih ==</option>
                                    <option value="1" {{ $employee->status_selkin == 1 ? 'selected' : '' }}>Sudah</option>
                                    <option value="0" {{ $employee->status_selkin == 0 ? 'selected' : '' }}>Belum</option>
                                </select>
                            </div>

                            <div class="col-12 mb-2">
                                <label for="nominal_selkin" class="form-label">Nominal Selkin</label>
                                <input type="number" class="form-control" id="nominal_selkin" wire:model="nominal_selkin" required>
                            </div>

                            <!-- Statistik dan Institusi -->
                            <div class="col-12 mb-2">
                                <label for="statistic_num" class="form-label">Nomor Statistik</label>
                                <input type="string" class="form-control" id="statistic_num" wire:model="statistic_num" required>
                            </div>

                            <div class="col-12 mb-2">
                                <label class="form-label">Nama Institusi</label>
                                <input type="text" class="form-control" value="IAKN Palangka Raya" disabled>
                            </div>

                            <div class="col-12 mb-2">
                                <label for="institution_category" class="form-label">Kategori Institusi</label>
                                <select class="form-select" id="institution_category" wire:model="institution_category">
                                    <option disabled>== Pilih ==</option>
                                    <option value="Universitas" {{ $employee->institution_category == 'Universitas' ? 'selected' : '' }}>Universitas</option>
                                    <option value="Institut" {{ $employee->institution_category == 'Institut' ? 'selected' : '' }}>Institut</option>
                                    <option value="Sekolah Tinggi" {{ $employee->institution_category == 'Sekolah Tinggi' ? 'selected' : '' }}>Sekolah Tinggi</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-lg" type="submit">Simpan Perubahan</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</div>

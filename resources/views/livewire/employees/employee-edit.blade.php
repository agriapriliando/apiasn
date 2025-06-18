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
                    @if (session()->has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    {{-- Pesan error validasi secara umum --}}
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Terjadi kesalahan:</strong>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form wire:submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <a href="{{ url('employees') }}" class="btn btn-primary mb-3">Kembali</a>
                                <button onclick="window.close()" class="btn btn-danger mb-3">
                                    Tutup Tab
                                </button>
                                <div class="d-grid position-fixed top-0 end-0" style="z-index: 9999; margin: 10px">
                                    <button class="btn btn-primary btn mb-2" type="submit" wire:loading.attr="disabled">Simpan Perubahan</button>
                                    <button wire:loading wire:target="update" disabled class="btn btn-warning">Sedang Menyimpan</button>
                                    @if (session()->has('success'))
                                        <div class="alert alert-success" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition>
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="input-group">
                                    <span class="input-group-text">ID :</span>
                                    <input type="text" class="form-control" value="{{ $employee->id }}" disabled>
                                </div>
                                <div class="form-text">ID tidak bisa dirubah</div>
                            </div>

                            {{-- Contoh validasi --}}
                            <div class="col-12 col-md-6 mb-2">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" id="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" wire:model="nama_lengkap" required>
                                @error('nama_lengkap')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 mb-2">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="number" id="nik" class="form-control @error('nik') is-invalid @enderror" wire:model="nik" required>
                                @error('nik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6mb-2">
                                <label for="nip" class="form-label">NIP</label>
                                <input type="text" id="nip" class="form-control @error('nip') is-invalid @enderror" wire:model="nip" required>
                                @error('nip')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6 mb-2">
                                <label for="nidn" class="form-label">NIDN</label>
                                <input type="text" id="nidn" class="form-control @error('nidn') is-invalid @enderror" wire:model="nidn">
                                @error('nidn')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6 mb-2">
                                <label for="nuptk" class="form-label">NUPTK</label>
                                <input type="text" id="nuptk" class="form-control @error('nuptk') is-invalid @enderror" wire:model="nuptk">
                                @error('nuptk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6 mb-2">
                                <label for="gender" class="form-label">Jenis Kelamin</label>
                                <select id="gender" class="form-select @error('gender') is-invalid @enderror" wire:model="gender">
                                    <option disabled>== PILIH ==</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6 mb-2">
                                <label for="birth_place" class="form-label">Tempat Lahir</label>
                                <input type="text" id="birth_place" class="form-control @error('birth_place') is-invalid @enderror" wire:model="birth_place" required>
                                @error('birth_place')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6 mb-2">
                                <label for="birth_date" class="form-label">Tgl Lahir</label>
                                <input type="date" id="birth_date" class="form-control @error('birth_date') is-invalid @enderror" wire:model="birth_date" required>
                                @error('birth_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-2">
                                <label for="address" class="form-label">Alamat</label>
                                <input type="text" id="address" class="form-control @error('address') is-invalid @enderror" wire:model="address" required>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-2">
                                <label for="district" class="form-label">Kecamatan</label>
                                <input type="text" id="district" class="form-control @error('district') is-invalid @enderror" wire:model="district">
                                @error('district')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-2">
                                <label for="city" class="form-label">Kota / Kabupaten</label>
                                <input type="text" id="city" class="form-control @error('city') is-invalid @enderror" wire:model="city">
                                @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-2">
                                <label for="province" class="form-label">Provinsi</label>
                                <input type="text" id="province" class="form-control @error('province') is-invalid @enderror" wire:model="province">
                                @error('province')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-4 mb-2">
                                <label for="employee_status" class="form-label">Status Pegawai</label>
                                <select id="employee_status" class="form-select @error('employee_status') is-invalid @enderror" wire:model="employee_status">
                                    <option disabled>== PILIH ==</option>
                                    <option value="PNS">PNS</option>
                                    <option value="PPPK">PPPK</option>
                                    <option value="CPNS">CPNS</option>
                                    <option value="CPPPK">CPPPK</option>
                                    <option value="Non ASN">Non ASN</option>
                                </select>
                                @error('employee_status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4 mb-2">
                                <label for="religion" class="form-label">Agama</label>
                                <select id="religion" name="religion" class="form-select" wire:model="religion">
                                    <option value="">== PILIH ==</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                </select>
                                @error('religion')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12 col-md-4 mb-2">
                                <label for="mobile_num" class="form-label">No HP</label>
                                <input type="text" class="form-control" id="mobile_num" name="mobile_num" wire:model.live="mobile_num" placeholder="NO HP" required>
                                @error('mobile_num')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12 col-md-3 mb-2">
                                <label for="status_pernikahan" class="form-label">Status Nikah</label>
                                <select id="status_pernikahan" name="status_pernikahan" class="form-select" wire:model="status_pernikahan" required>
                                    <option value="">== PILIH ==</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                    <option value="Duda">Duda</option>
                                    <option value="Janda">Janda</option>
                                </select>
                                @error('status_pernikahan')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="my-3">
                                <h3>Data Diisi Oleh Bagian Keuangan</h3>
                            </div>
                            <hr>
                            <div class="col-12 col-md-3 mb-2">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="status_sertifikasi">Sertifikasi</label>
                                    <select name="status_sertifikasi" class="form-select" id="status_sertifikasi" wire:model.live="status_sertifikasi">
                                        <option value="">== Pilih ==</option>
                                        <option value="1">Sudah</option>
                                        <option value="0">Belum</option>
                                    </select>
                                </div>
                                @error('status_sertifikasi')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            @if ($status_sertifikasi == 1)
                                <div class="col-12 col-md-7 mb-2">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Nominal Sertifikasi <br>Yang Diterima : Rp</span>
                                        <input type="number" class="form-control @error('nominal_sertifikasi_yg_diterima') is-invalid @enderror" id="nominal_sertifikasi_yg_diterima"
                                            name="nominal_sertifikasi_yg_diterima" wire:model="nominal_sertifikasi_yg_diterima" placeholder="Isi Nominal">
                                    </div>
                                    @error('nominal_sertifikasi_yg_diterima')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            @endif

                            <hr>
                            <div class="col-12 col-md-3 mb-2 d-none">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="status_remonerasi">Status Remonerasi</label>
                                    <select name="status_remonerasi" class="form-select @error('status_remonerasi') is-invalid @enderror" id="status_remonerasi"
                                        wire:model.live="status_remonerasi">
                                        <option value="">== Pilih ==</option>
                                        <option value="1">Sudah</option>
                                        <option value="0">Belum</option>
                                    </select>
                                </div>
                                @error('status_remonerasi')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            @if ($status_remonerasi == 1)
                                <div class="col-12 col-md-7 mb-2">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Nominal Remonerasi : Rp</span>
                                        <input type="number" class="form-control @error('nominal_remonerasi') is-invalid @enderror" id="nominal_remonerasi" name="nominal_remonerasi"
                                            wire:model="nominal_remonerasi" placeholder="Isi Nominal">
                                    </div>
                                    @error('nominal_remonerasi')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            @endif

                            <div class="col-12 col-md-3 mb-2">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="status_tukin">Status Tukin</label>
                                    <select name="status_tukin" class="form-select @error('status_tukin') is-invalid @enderror" id="status_tukin" wire:model.live="status_tukin">
                                        <option value="">== Pilih ==</option>
                                        <option value="1">Sudah</option>
                                        <option value="0">Belum</option>
                                    </select>
                                </div>
                                @error('status_tukin')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            @if ($status_tukin == 1)
                                <div class="col-12 col-md-7 mb-2">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Nominal Tukin Rp</span>
                                        <input type="number" class="form-control" id="nominal_tukin" name="nominal_tukin" wire:model="nominal_tukin" placeholder="Isi Nominal">
                                    </div>
                                    @error('nominal_tukin')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            @endif

                            <hr>

                            <div class="col-12 col-md-3 mb-2">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="status_selkin">Selisih Tukin</label>
                                    <select name="status_selkin" class="form-select" id="status_selkin" wire:model.live="status_selkin">
                                        <option value="">== Pilih ==</option>
                                        <option value="1">Sudah</option>
                                        <option value="2">Belum</option>
                                    </select>
                                </div>
                                @error('status_selkin')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            @if ($status_selkin == 1)
                                <div class="col-12 col-md-7 mb-2">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Nominal <br>Selisih Tukin : Rp</span>
                                        <input type="number" class="form-control" id="nominal_selkin" name="nominal_selkin" wire:model="nominal_selkin" placeholder="Isi Nominal" required>
                                    </div>
                                    @error('nominal_selkin')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            @endif

                            <hr>
                            <div class="col-12 col-md-4 mb-2">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Nama Institusi</span>
                                    <input type="text" class="form-control" wire:model="nama_institusi" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 mb-2">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Kategori Institusi</span>
                                    <input type="text" class="form-control" wire:model="institution_category" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-md-8 mb-2">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Nomor Statistik Perguruan Tinggi</span>
                                    <input type="number" class="form-control" id="statistic_num" name="statistic_num" wire:model="statistic_num">
                                </div>
                                @error('statistic_num')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Di akhir form --}}
                            <div class="col-12">
                                <div class="d-grid">
                                    <button class="btn btn-primary btn" type="submit" wire:loading.attr="disabled">Simpan Perubahan</button>
                                    <button wire:loading wire:target="update" disabled class="btn btn-warning">Sedang Menyimpan</button>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </section>
</div>

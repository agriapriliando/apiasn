<div>
    <section class="py-3 py-md-5 py-xl-8">
        <div class="container">
            <div class="row mb-2">
                <div class="col-12">
                    <h3 class="fs-5 mb-2 text-secondary text-uppercase">IAKN Palangka Raya</h3>
                    <h2 class="display-5">Aplikasi Data ASN Interkoneksi</h2>
                </div>
                <div class="col-12">
                    <button onclick="location.reload()" class="btn btn-warning">
                        Refresh Halaman
                    </button>
                </div>
                <div class="col-12 col-md-8 d-none">
                    <div class="row g-2 align-items-center mb-3">
                        <div class="col-auto">
                            <label>Data Bulan:</label>
                            <select wire:model.live="bln_data" class="form-select">
                                <option value="">== Bulan ==</option>
                                @foreach ($daftarBulan as $i => $nama)
                                    <option value="{{ $i + 1 }}">{{ $nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto">
                            <label>Data Tahun:</label>
                            <select wire:model.live="thn_data" class="form-select">
                                <option value="">== Tahun ==</option>
                                @foreach ($daftarTahun as $tahun)
                                    <option value="{{ $tahun }}">{{ $tahun }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto" x-data="{ show: false }">
                            <div x-show="!show" class="btn btn-sm btn-danger" @click="show = !show">Hapus Data Bulan Ini</div>
                            <button @click.outside="show = false" x-show="show" wire:click="hapusDataBulan" class="btn btn-sm btn-danger">
                                Ya Hapus
                            </button>
                            <button @click.outside="show = false" x-show="show" x-on:click="show = false" class="btn btn-sm btn-secondary">
                                Batal
                            </button>
                        </div>
                    </div>

                    <!-- Duplikat ke -->
                    <div class="row g-2 align-items-center mb-3">
                        <div class="col-auto">
                            <label>Duplikat ke Bulan:</label>
                            <select wire:model="bln_tujuan" class="form-select">
                                <option value="">== Bulan ==</option>
                                @foreach ($daftarBulan as $i => $nama)
                                    <option value="{{ $i + 1 }}">{{ $nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto">
                            <label>Duplikat ke Tahun:</label>
                            <select wire:model="thn_tujuan" class="form-select">
                                <option value="">== Tahun ==</option>
                                @foreach ($daftarTahun as $tahun)
                                    <option value="{{ $tahun }}">{{ $tahun }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto" x-data="{ show: false }">
                            <!-- Tombol awal -->
                            <button type="button" class="btn btn-sm btn-primary" @click="show = true" x-show="!show">
                                Duplikat Data
                            </button>

                            <!-- Konfirmasi -->
                            <div x-show="show" @click.outside="show = false" class="mt-2 d-flex gap-2">
                                <!-- Tombol konfirmasi duplikat -->
                                <button type="button" wire:click="duplicateToAnotherMonth" class="btn btn-sm btn-danger" wire:loading.attr="disabled">
                                    Ya, Duplikat
                                </button>
                                <!-- Tombol batal -->
                                <button type="button" class="btn btn-sm btn-secondary" @click="show = false">
                                    Batal
                                </button>
                            </div>
                        </div>

                    </div>

                    @if (session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <div wire:loading>
                        Sedang Proses, Tunggu...
                    </div>
                    <div wire:loading wire:target="bln_data">
                        <small class="text-muted">Sedang memuat data bulan yang dipilih...</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row justify-content-xl-center">
                        <div class="col-12 col-xl-11">
                            <div>
                                Toggle column:
                                <a class="toggle-vis btn btn-sm" data-column="1">Nik</a> -
                                <a class="toggle-vis btn btn-sm" data-column="3">Nidn</a> -
                                <a class="toggle-vis btn btn-sm" data-column="4">Nuptk</a> -
                                <a class="toggle-vis btn btn-sm" data-column="6">Gender</a> -
                                <a class="toggle-vis btn btn-sm" data-column="7">Tempat</a> -
                                <a class="toggle-vis btn btn-sm" data-column="8">Tgl Lahir</a> -
                                <a class="toggle-vis btn btn-sm" data-column="9">Address</a> -
                                <a class="toggle-vis btn btn-sm" data-column="10">Kecamatan</a> -
                                <a class="toggle-vis btn btn-sm" data-column="11">Kota</a> -
                                <a class="toggle-vis btn btn-sm" data-column="12">Provinsi</a> -
                                <a class="toggle-vis btn btn-sm" data-column="14">Agama</a> -
                                <a class="toggle-vis btn btn-sm" data-column="16">Status Nikah</a> -
                                <a class="toggle-vis btn btn-sm" data-column="17">Sertifikasi</a> -
                                <a class="toggle-vis btn btn-sm" data-column="18">Nominal Ser</a> -
                                <a class="toggle-vis btn btn-sm" data-column="21">Tukin</a> -
                                <a class="toggle-vis btn btn-sm" data-column="22">Nominal Tukin</a> -
                                <a class="toggle-vis btn btn-sm" data-column="23">Selkin</a> -
                                <a class="toggle-vis btn btn-sm" data-column="24">Nominal Selkin</a> -
                                <a class="toggle-vis btn btn-sm" data-column="25">Statistik Num</a> -
                                <a class="toggle-vis btn btn-sm" data-column="26">last_update</a>

                            </div>
                            <!-- table -->
                            <div class="mb-4 mb-md-5">
                                <table id="myTable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NIK</th>
                                            <th>NIP</th>
                                            <th>NIDN</th>
                                            <th>NUPTK</th>
                                            <th>Nama Lengkap</th>
                                            <th>Gender</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>Kecamatan</th>
                                            <th>Kota/Kabupaten</th>
                                            <th>Provinsi</th>
                                            <th>Status Pegawai</th>
                                            <th>Agama</th>
                                            <th>Nomor HP</th>
                                            <th>Status Pernikahan</th>
                                            <th>Sertifikasi</th>
                                            <th>Nominal Sertifikasi</th>
                                            <th>Remunerasi</th>
                                            <th>Nominal Remunerasi</th>
                                            <th>Tunjangan Kinerja</th>
                                            <th>Nominal Tukin</th>
                                            <th>Selisih Tukin<br>Selkin</th>
                                            <th>Nominal Selkin</th>
                                            <th>Nomor Statistik</th>
                                            <th>Last Update</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $employee)
                                            <tr>
                                                <td>{{ $loop->iteration }}
                                                    <div class="d-print-none">
                                                        <a target="_blank" href="{{ url('employees/' . $employee->id . '/edit') }}" class="btn btn-sm"><i class="bi bi-pencil"></i></a>
                                                        <a target="_blank"
                                                            href="https://wa.me/{{ $employee->mobile_num }}?text=Selamat%20Pagi%20Bpk%2FIbu.%20Mohon%20perkenaannya%20mengisi%20form%20berikut%20untuk%20Data%20Interkoneksi%20Kementerian%20Agama.%20Terima%20kasih.%0ALink%20%3A%20{{ url('employees/' . $employee->id . '/edit') }}"
                                                            class="btn btn-sm"><i class="bi bi-whatsapp"></i></a>
                                                    </div>
                                                </td>
                                                <td>{{ $employee->nik }}</td>
                                                <td>{{ $employee->nip }}</td>
                                                <td>{{ $employee->nidn }}</td>
                                                <td>{{ $employee->nuptk }}</td>
                                                <td>{{ $employee->nama_lengkap }}</td>
                                                <td>{{ $employee->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                                <td>{{ $employee->birth_place }}</td>
                                                <td>{{ $employee->birth_date ? \Carbon\Carbon::parse($employee->birth_date)->format('d-m-Y') : '' }}</td>
                                                <td>{{ $employee->address }}</td>
                                                <td>{{ $employee->district }}</td>
                                                <td>{{ $employee->city }}</td>
                                                <td>{{ $employee->province }}</td>
                                                <td>{{ $employee->employee_status }}</td>
                                                <td>{{ $employee->religion }}</td>
                                                <td>{{ $employee->mobile_num }}</td>
                                                <td>{{ $employee->status_pernikahan }}</td>
                                                <td>{!! $employee->status_sertifikasi ? '✅' : '❌' !!}</td>
                                                <td>{{ number_format($employee->nominal_sertifikasi_yg_diterima ?? 0, 0, ',', '.') }}</td>
                                                <td>{!! $employee->status_remonerasi ? '✅' : '❌' !!}</td>
                                                <td>{{ number_format($employee->nominal_remonerasi ?? 0, 0, ',', '.') }}</td>
                                                <td>{!! $employee->status_tukin ? '✅' : '❌' !!}</td>
                                                <td>{{ number_format($employee->nominal_tukin ?? 0, 0, ',', '.') }}</td>
                                                <td>{!! $employee->status_selkin ? '✅' : '❌' !!}</td>
                                                <td>{{ number_format($employee->nominal_selkin ?? 0, 0, ',', '.') }}</td>
                                                <td>{{ $employee->statistic_num }}</td>
                                                <td>{{ $employee->updated_at->locale('id')->isoFormat('D MMMM Y HH:mm') }} WIB</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <!-- table -->
                            <div class="mb-4 mb-md-5">
                                <hr class="w-50 mb-3 border-dark-subtle">
                                <address class="m-0 text-secondary">Seluruh data ini diakses oleh HDI Kemenag secara
                                    <b>Real Time</b> <br> memakai API berikut :
                                </address>
                                <a href="">URL : _____</a>
                            </div>
                            <div class="row mb-sm-4 mb-md-5">
                                <div class="col-12 col-sm-6">
                                    <div class="mb-4 mb-sm-0">
                                        <div class="mb-3 text-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-telephone-outbound" viewBox="0 0 16 16">
                                                <path
                                                    d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="mb-2">Phone</h4>
                                            <p class="mb-2">Please speak with us directly.</p>
                                            <hr class="w-75 mb-3 border-dark-subtle">
                                            <p class="mb-0">
                                                <a class="link-secondary text-decoration-none" href="tel:+15057922430">(505) 792-2430</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="mb-4 mb-sm-0">
                                        <div class="mb-3 text-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                                                <path
                                                    d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z" />
                                                <path
                                                    d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="mb-2">Email</h4>
                                            <p class="mb-2">Please write to us directly.</p>
                                            <hr class="w-75 mb-3 border-dark-subtle">
                                            <p class="mb-0">
                                                <a class="link-secondary text-decoration-none" href="mailto:demo@yourdomain.com">demo@yourdomain.com</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="mb-3 text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                                        <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z" />
                                        <path
                                            d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="mb-2">Opening Hours</h4>
                                    <p class="mb-2">Explore our business opening hours.</p>
                                    <hr class="w-50 mb-3 border-dark-subtle">
                                    <div class="d-flex mb-1">
                                        <p class="text-secondary fw-bold mb-0 me-5">Mon - Fri</p>
                                        <p class="text-secondary mb-0">9am - 5pm</p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="text-secondary fw-bold mb-0 me-5">Sat - Sun</p>
                                        <p class="text-secondary mb-0">9am - 2pm</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

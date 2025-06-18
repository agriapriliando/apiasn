<?php

namespace App\Livewire\Employees;

use App\Models\Employee;
use Livewire\Component;

class EmployeeEdit extends Component
{
    public $employee;

    public $nik, $nip, $nidn, $nuptk, $nama_lengkap, $gender, $birth_place, $birth_date;
    public $address, $district, $city, $province, $employee_status, $religion, $mobile_num;
    public $status_pernikahan, $status_sertifikasi, $nominal_sertifikasi_yg_diterima;
    public $status_remonerasi, $nominal_remonerasi, $status_tukin, $nominal_tukin;
    public $status_selkin, $nominal_selkin, $statistic_num, $nama_institusi, $institution_category;

    public function mount($id)
    {

        $this->employee = Employee::findOrFail($id);
        session(['link' => url()->current()]);
        $this->nik = $this->employee->nik;
        $this->nip = $this->employee->nip;
        $this->nidn = $this->employee->nidn;
        $this->nuptk = $this->employee->nuptk;
        $this->nama_lengkap = $this->employee->nama_lengkap;
        $this->gender = $this->employee->gender;
        $this->birth_place = $this->employee->birth_place;
        $this->birth_date = $this->employee->birth_date;
        $this->address = $this->employee->address;
        $this->district = $this->employee->district;
        $this->city = $this->employee->city;
        $this->province = $this->employee->province;
        $this->employee_status = $this->employee->employee_status;
        $this->religion = $this->employee->religion;
        $this->mobile_num = $this->employee->mobile_num;
        $this->status_pernikahan = $this->employee->status_pernikahan;
        $this->status_sertifikasi = $this->employee->status_sertifikasi;
        $this->nominal_sertifikasi_yg_diterima = $this->employee->nominal_sertifikasi_yg_diterima;
        $this->status_remonerasi = $this->employee->status_remonerasi;
        $this->nominal_remonerasi = $this->employee->nominal_remonerasi;
        $this->status_tukin = $this->employee->status_tukin;
        $this->nominal_tukin = $this->employee->nominal_tukin;
        $this->status_selkin = $this->employee->status_selkin;
        $this->nominal_selkin = $this->employee->nominal_selkin;
        $this->statistic_num = $this->employee->statistic_num;
        $this->nama_institusi = $this->employee->nama_institusi;
        $this->institution_category = $this->employee->institution_category;
    }

    public function update()
    {
        // dd($this->employee);
        $this->validate([
            'nik' => 'required',
            'nip' => 'required',
            'nama_lengkap' => 'required',
            'gender' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required|date',
            'address' => 'required',
            'district' => '',
            'city' => 'required',
            'province' => 'required',
            'employee_status' => 'required',
            'religion' => 'required',
            'mobile_num' => 'required',
            'status_pernikahan' => 'required',
            'status_sertifikasi' => 'required',
            'nominal_sertifikasi_yg_diterima' => 'nullable|numeric',
            'status_remonerasi' => 'required',
            'nominal_remonerasi' => 'nullable|numeric',
            'status_tukin' => 'required',
            'nominal_tukin' => 'nullable|numeric',
            'status_selkin' => 'required',
            'nominal_selkin' => 'nullable|numeric',
            'statistic_num' => '',
        ]);

        $this->employee->update([
            'nik' => $this->nik,
            'nip' => $this->nip,
            'nidn' => $this->nidn,
            'nuptk' => $this->nuptk,
            'nama_lengkap' => $this->nama_lengkap,
            'gender' => $this->gender,
            'birth_place' => $this->birth_place,
            'birth_date' => $this->birth_date,
            'address' => $this->address,
            'district' => $this->district,
            'city' => $this->city,
            'province' => $this->province,
            'employee_status' => $this->employee_status,
            'religion' => $this->religion,
            'mobile_num' => $this->mobile_num,
            'status_pernikahan' => $this->status_pernikahan,
            'status_sertifikasi' => (bool) $this->status_sertifikasi,
            'nominal_sertifikasi_yg_diterima' => $this->nominal_sertifikasi_yg_diterima,
            'status_remonerasi' => (bool) $this->status_remonerasi,
            'nominal_remonerasi' => $this->nominal_remonerasi,
            'status_tukin' => (bool) $this->status_tukin,
            'nominal_tukin' => $this->nominal_tukin,
            'status_selkin' => (bool) $this->status_selkin,
            'nominal_selkin' => $this->nominal_selkin,
            'statistic_num' => $this->statistic_num,
        ]);

        session()->flash('success', 'Data pegawai berhasil diperbarui.');
    }

    public function render()
    {
        return view('livewire.employees.employee-edit');
    }
}

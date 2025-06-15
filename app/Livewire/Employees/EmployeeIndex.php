<?php

namespace App\Livewire\Employees;

use Livewire\Component;
use App\Models\Employee;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class EmployeeIndex extends Component
{
    public $bln_data;
    public $thn_data;
    public $bln_tujuan;
    public $thn_tujuan;
    public $employees = [];

    public $daftarBulan = [
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    ];

    public $daftarTahun = [];

    public function mount()
    {
        $this->bln_data = "";
        $this->thn_data = now()->year;
        $this->bln_tujuan = "";
        $this->thn_tujuan = now()->year;
        $this->daftarTahun = [2024, 2025];
        $this->getEmployees();
    }

    public function updatedBlnData()
    {
        $this->getEmployees();
    }
    public function updatedThnData()
    {
        $this->getEmployees();
    }

    public function getEmployees()
    {
        $this->employees = Employee::whereMonth('tgl_data', $this->bln_data)
            ->whereYear('tgl_data', $this->thn_data)
            ->get();
        // Untuk re-inisialisasi DataTable di JS
        $this->dispatch('datatable-reload');
    }

    public function duplicateToAnotherMonth()
    {
        $sourceEmployees = Employee::whereMonth('tgl_data', $this->bln_data)
            ->whereYear('tgl_data', $this->thn_data)
            ->get();

        DB::beginTransaction();

        try {
            foreach ($sourceEmployees as $emp) {
                $new = $emp->replicate();

                // Ganti tgl_data ke bulan & tahun tujuan
                $new->tgl_data = Carbon::now()
                    ->setYear((int) $this->thn_tujuan)
                    ->setMonth((int) $this->bln_tujuan)
                    ->setDay(1);

                // dd($new->tgl_data);
                $new->save();
            }

            DB::commit();
            session()->flash('message', 'Data berhasil diduplikat.');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        $this->getEmployees(); // Refresh jika bulan tujuan sama dengan bulan asal
    }

    public function hapusDataBulan()
    {
        if (!$this->bln_data || !$this->thn_data) {
            session()->flash('error', 'Bulan dan tahun harus dipilih.');
            return;
        }

        Employee::whereMonth('tgl_data', $this->bln_data)
            ->whereYear('tgl_data', $this->thn_data)
            ->delete();

        session()->flash('success', 'Seluruh data berhasil dihapus untuk bulan ' . $this->bln_data . ' dan tahun ' . $this->thn_data . '.');
    }

    public function render()
    {
        return view('livewire.employees.employee-index');
    }
}

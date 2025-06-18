<?php

use App\Http\Middleware\CekSession;
use App\Livewire\Employees\EmployeeEdit;
use App\Livewire\Employees\EmployeeIndex;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', fn() => view('beranda'));
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dataasn', function () {
    session(['kre' => '1234567890']);
    return redirect('/employees')->with('message', 'Berhasil login');
});

Route::get('/logout', function () {
    Session::flush();
    return redirect('/');
});


Route::get('/employees', EmployeeIndex::class)->name('employees.index')->middleware(CekSession::class);
Route::get('/employees/{id}/edit', EmployeeEdit::class)->name('employees.edit');

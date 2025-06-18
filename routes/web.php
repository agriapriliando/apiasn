<?php

use App\Livewire\Employees\EmployeeEdit;
use App\Livewire\Employees\EmployeeIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('beranda'));
// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/employees', EmployeeIndex::class)->name('employees.index');
Route::get('/employees/{id}/edit', EmployeeEdit::class)->name('employees.edit');

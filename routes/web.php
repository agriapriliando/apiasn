<?php

use App\Livewire\Employees\EmployeeIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/employees', EmployeeIndex::class)->name('employees.index');

<?php

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [App\Http\Controllers\Api\AuthController::class, 'login']);

Route::get('/employee', function () {
    $total = Employee::whereMonth('tgl_data', now()->month)->count();
    if ($total == 0) {
        return response()->json([
            'success' => false,
            'message' => 'Data tidak ditemukan atau belum diupdate',
        ]);
    }
    return response()->json([
        'success' => true,
        'jumlah_pegawai' => $total,
        'month' => now()->month,
        'year' => now()->year,
        'employees' => Employee::whereMonth('tgl_data', now()->month)->get(),
    ]);
})->middleware('auth:sanctum');

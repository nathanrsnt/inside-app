<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\PentestingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Home
Route::get('/', [PentestingController::class, 'showPentesting'])->name('pentesting');

//===Scans===
//nmap
Route::post('/run-nmap', [ScanController::class, 'runNmap'])->name('run.nmap');
Route::get('/nmap', [ScanController::class, 'showNmap'])->name('nmap');

//gobuster
Route::get('/run-gobuster', [ScanController::class, 'runGobuster'])->name('run.gobuster');
Route::get('/gobuster', [ScanController::class, 'showGobuster'])->name('gobuster');


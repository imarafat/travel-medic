<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/agency', [App\Http\Controllers\HomeController::class, 'agency'])->name('agency');

Route::get('/travellers', [App\Http\Controllers\HomeController::class, 'travellers'])->name('travellers');

Route::get('/clinical_records', [App\Http\Controllers\HomeController::class, 'clinical_records'])->name('clinical_records');
Route::get('/drug_test', [App\Http\Controllers\HomeController::class, 'drug_test'])->name('drug_test');
Route::get('/remarks', [App\Http\Controllers\HomeController::class, 'remarks'])->name('remarks');
Route::get('/physical', [App\Http\Controllers\HomeController::class, 'physical'])->name('physical');
Route::get('/radiology', [App\Http\Controllers\HomeController::class, 'radiology'])->name('radiology');

Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users');

Route::get('/user_types', [App\Http\Controllers\HomeController::class, 'user_types'])->name('user_types');


Route::post('new-agency', [App\Http\Controllers\HomeController::class, 'new_agency'])->name('new_agency');

Route::post('new-clinical-records', [App\Http\Controllers\HomeController::class, 'new_clinical_records'])->name('new_clinical_records');

Route::post('new-drug-test', [App\Http\Controllers\HomeController::class, 'new_drug_test'])->name('new_drug_test');

Route::post('new-radio-test', [App\Http\Controllers\HomeController::class, 'new_radio_test'])->name('new_radio_test');

Route::post('new-physical-exam', [App\Http\Controllers\HomeController::class, 'new_physical_exam'])->name('new_physical_exam');

Route::post('new-travellers', [App\Http\Controllers\HomeController::class, 'new_travellers'])->name('new_travellers');

Route::post('new-remarks', [App\Http\Controllers\HomeController::class, 'new_remarks'])->name('new_remarks');

Route::post('new-user-type', [App\Http\Controllers\HomeController::class, 'new_user_type'])->name('new_user_type');



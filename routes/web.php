<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShipmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['middleware' => [ 'role:super-admin|user']], function () {
    Route::get('/dashboard', function (){
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/shipment', [ShipmentController::class, 'index'])->name('shipment.index');
    Route::get('shipment/create', [ShipmentController::class, 'create'])->name('shipment.create');
    Route::post('/shipment/store', [ShipmentController::class, 'store'])->name('shipment.store');
});


require __DIR__.'/auth.php';

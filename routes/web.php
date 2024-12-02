<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDataController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('manage-permission', PermissionController::class);

    Route::middleware('permission:role-create')->group(function () {
        Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    });
    Route::middleware('permission:role-list')->group(function () {
        Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/roles/{id}', [RoleController::class, 'show'])->name('roles.show');
    });
    Route::middleware('permission:role-edit')->group(function () {
        Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
    });

    Route::middleware('permission:role-delete')->group(function () {
        Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
    });

    // User Routes

    Route::middleware('permission:user-create')->group(function () {
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
    });
    Route::middleware('permission:user-list')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    });

    Route::middleware('permission:user-edit')->group(function () {
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    });

    Route::middleware('permission:user-delete')->group(function () {
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    Route::middleware('permission:student-list')->group(function () {
        Route::get('/student-index', [UserDataController::class, 'index'])->name('users.data.index');
        Route::get('/student-show/{id}', [UserDataController::class, 'show'])->name('users.data.show');
    });

    Route::middleware('permission:student-create')->group(function () {
        Route::get('/student-create', [UserDataController::class, 'create'])->name('users.data.create');
        Route::post('/student-store', [UserDataController::class, 'store'])->name('users.data.store');
    });

    Route::middleware('permission:student-edit')->group(function () {
        Route::get('/student-edit/{id}', [UserDataController::class, 'edit'])->name('users.data.edit');
        Route::put('/student-update/{id}', [UserDataController::class, 'update'])->name('users.data.update');
    });

    Route::middleware('permission:student-delete')->group(function () {
        Route::delete('/student-delete/{id}', [UserDataController::class, 'delete'])->name('users.data.delete');
    });
});

require __DIR__.'/auth.php';

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\User;
use App\Http\Controllers\Api\Signature;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('users', [User::class, 'getAllUsers'])->name('getAllUsers');
Route::get('users/{id}', [User::class, 'getUserById'])->name('getUserById');
Route::post('users', [User::class, 'createUser'])->name('createUser');
Route::put('users/{id}', [User::class, 'updateUser'])->name('updateUser');
Route::delete('users/{id}', [User::class, 'deleteUser'])->name('deleteUser');

Route::get('signatures', [Signature::class, 'getAllSignatures'])->name('getAllSignatures');

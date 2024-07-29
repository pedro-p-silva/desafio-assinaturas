<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\User;
use App\Http\Controllers\Api\Signature;
use App\Http\Controllers\Api\Invoice;

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

/*
|--------------------------------------------------------------------------
| USER
|--------------------------------------------------------------------------
*/
Route::get('users', [User::class, 'getAllUsers'])->name('getAllUsers');
Route::get('users/{id}', [User::class, 'getUserById'])->name('getUserById');
Route::post('users', [User::class, 'createUser'])->name('createUser');
Route::put('users/{id}', [User::class, 'updateUser'])->name('updateUser');
Route::delete('users/{id}', [User::class, 'deleteUser'])->name('deleteUser');

/*
|--------------------------------------------------------------------------
| SIGNATURES
|--------------------------------------------------------------------------
*/
Route::get('signatures', [Signature::class, 'getAllSignatures'])->name('getAllSignatures');
Route::get('signatures/{id}', [Signature::class, 'getSignatureById'])->name('getSignatureById');
Route::post('signatures', [Signature::class, 'createSignature'])->name('createSignature');
Route::put('signatures/{id}', [Signature::class, 'updateSignature'])->name('updateSignature');
Route::delete('signatures/{id}', [Signature::class, 'deleteSignature'])->name('deleteSignature');

/*
|--------------------------------------------------------------------------
| INVOICES
|--------------------------------------------------------------------------
*/
Route::get('invoices', [Invoice::class, 'getAllInvoices'])->name('getAllInvoices');
Route::get('invoices/{id}', [Invoice::class, 'getInvoiceById'])->name('getInvoiceById');
Route::post('invoices', [Invoice::class, 'createInvoice'])->name('createInvoice');
Route::put('invoices/{id}', [Invoice::class, 'updateInvoice'])->name('updateInvoice');
Route::delete('invoices/{id}', [Invoice::class, 'deleteInvoice'])->name('deleteInvoice');



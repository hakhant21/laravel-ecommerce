<?php

use App\Http\Controllers\ProfileController;
use Hak\MyanmarPaymentUnion\PaymentGateway;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    $gateway = new PaymentGateway(env('MERCHANT_ID'), env('SECRET_KEY'), env('SANDBOX_MODE'));

    $csrf_token = csrf_token();

    $payment = $gateway->create([
        'currencyCode' => 'MMK',
        'amount' => 1000,
        'invoiceNo' => random_int(11111111, 99999999),
        'description' => 'test payment description',
        'frontendReturnUrl' => 'https://ecommerce.test/payments/success'
    ]);

    return redirect()->away($payment->url)->with('csrf_token', csrf_token());
});

Route::get('/payments/success', function(){
    $gateway = new PaymentGateway(env('MERCHANT_ID'), env('SECRET_KEY'), env('SANDBOX_MODE'));

    $inquiry = $gateway->inquiry([
        'invoiceNo' => '72691033'
    ]);

    return $inquiry->parameters;
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin/category/web.php';
require __DIR__.'/admin/product/web.php';

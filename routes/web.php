<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesEnquiryController;
use App\Http\Controllers\UserLicensePlansController;
use App\Http\Controllers\PortalLoginController;

//home 
Route::get('/', function () {
    return view('pages.index');
});

//sales enq
Route::post('/sales-enquiry-submit', [SalesEnquiryController::class, 'store'])
    ->name('sales.enquiry.submit');

//user plans
Route::get('pricing', [UserLicensePlansController::class, 'index'])->name('marketplace.pricing');
Route::post('apply-promocode', [UserLicensePlansController::class, 'applyPromocode'])->name('marketplace.applyPromocode');
// Route::post('apply-coupon-for-team', [UserLicensePlansController::class, 'applyCouponForTeam']);
Route::get('payment', [UserLicensePlansController::class, 'payment']);
Route::post('store-user-payment', [UserLicensePlansController::class, 'saveUserPayment'])->name('store.user.payment');
// Route::post('store-single-user-payment', [UserLicensePlansController::class, 'saveSingleUserDetails'])->name('marketplace.store.payment');
// Route::post('store-team-user-payment', [UserLicensePlansController::class, 'saveTeamUserDetails'])->name('marketplace.store.payment');
Route::post('change-currency', [UserLicensePlansController::class, 'changeCurrency']);

//for single user
// Route::get('/single-user', function () {
//     return view('marketplace.single-user');
// })->name('single-user');

//for team
// Route::get('/payment', function () {
//     return view('marketplace.payment');
// })->name('payment');

//save company data
Route::post('/save-company', [CompanyController::class, 'store'])->name('saveCompany');
Route::post('/save-payment', [CompanyController::class, 'savePayment'])->name('savePayment');
Route::get('/thank-you', [CompanyController::class, 'paymentSuccess'])->name('paymentSuccess');

//portal login
Route::get('/docs-login', [PortalLoginController::class, 'showLogin'])->name('docs.login');
Route::post('/docs-login', [PortalLoginController::class, 'login'])->name('docs.login.submit');

//page routes
Route::get('/{page}', function ($page) {
    if (view()->exists('pages.' . $page)) {
        return view('pages.' . $page);
    }
    abort(404);
});

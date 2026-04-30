<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesEnquiryController;
use App\Http\Controllers\UserLicenseController;
use App\Http\Controllers\PortalLoginController;

Route::get('/', function () {
    return view('pages.index');
});


Route::post('/sales-enquiry-submit', [SalesEnquiryController::class, 'store'])
    ->name('sales.enquiry.submit');


//user license
Route::get('pricing', [UserLicenseController::class, 'index'])->name('marketplace.pricing');
Route::post('store-payment', [UserLicenseController::class, 'saveSubscription'])->name('marketplace.store.payment');
Route::post('apply-coupon', [UserLicenseController::class, 'applyCoupon'])->name('marketplace.apply.coupon');

Route::post('apply-coupon-for-team', [UserLicenseController::class, 'applyCouponForTeam']);
Route::get('payment-for-team', [UserLicenseController::class, 'paymentForTeam']);
Route::post('store-payment-for-team', [UserLicenseController::class, 'savePaymentForTeam']);

// Route::post('ul-store-payment', [UserLicenseController::class, 'store'])->name('ul.store.payment');
// Route::get('saved-card', [UserLicenseController::class, 'getSavedCard'])->name('saved.card');
// Route::get('user-license-lists', [UserLicenseController::class, 'getUserLicenseLists'])->name('user.license.lists');
// Route::get('used-license-user-list', [UserLicenseController::class, 'getUsedUserLicenseLists'])->name('used.license.user.list');
// Route::get('users-license-editUser', [UserLicenseController::class, 'getEditUserLicenseDetails'])->name('users.license.editUser');
// Route::post('users-license-editUser-details', [UserLicenseController::class, 'editUserLicenseDetails'])->name('users.license.editUser.details');
// Route::post('users-license-deleteUser-details', [UserLicenseController::class, 'deleteUserLicenseDetails'])->name('users.license.deleteUser.details');
// Route::get('users-license-companies-lists', [UserLicenseController::class, 'getCompaniesByClient'])->name('users.license.fetch.companies.by.client');
// Route::post('ul-upload-csv', [UserLicenseController::class, 'uploadCsv'])->name('ul.upload.csv');
// Route::get('edit-license-manage-settings', [UserLicenseController::class, 'editLicenseViaManageSettings'])->name('edit.license.manage.settings');

Route::get('/single-user', function () {
    return view('marketplace.single-user');
})->name('single-user');

Route::get('/payment', function () {
    return view('marketplace.payment');
})->name('payment');

Route::post('/save-company', [CompanyController::class, 'store'])->name('saveCompany');
Route::post('/save-payment', [CompanyController::class, 'savePayment'])->name('savePayment');
Route::get('/thank-you', [CompanyController::class, 'paymentSuccess'])->name('paymentSuccess');


Route::get('/docs-login', [PortalLoginController::class, 'showLogin'])->name('docs.login');

Route::post('/docs-login', [PortalLoginController::class, 'login'])->name('docs.login.submit');

Route::get('/{page}', function ($page) {
    if (view()->exists('pages.' . $page)) {
        return view('pages.' . $page);
    }
    abort(404);
});

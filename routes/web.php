<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesEnquiryController;
use App\Http\Controllers\UserLicensePlansController;
use App\Http\Controllers\PortalLoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CareerController;

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
Route::get('payment', [UserLicensePlansController::class, 'payment']);
Route::post('store-user-payment', [UserLicensePlansController::class, 'saveUserPayment'])->name('store.user.payment');
Route::post('change-currency', [UserLicensePlansController::class, 'changeCurrency']);
Route::post('check-username', [UserLicensePlansController::class, 'checkUsername'])->name('check.username');
Route::post('check-userEmail', [UserLicensePlansController::class, 'checkUserEmail'])->name('check.userEmail');

//save company data
Route::post('/save-company', [CompanyController::class, 'store'])->name('saveCompany');
Route::post('/save-payment', [CompanyController::class, 'savePayment'])->name('savePayment');
Route::get('/thank-you', [CompanyController::class, 'paymentSuccess'])->name('paymentSuccess');

//portal login
Route::get('/docs-login', [PortalLoginController::class, 'showLogin'])->name('docs.login');
Route::post('/docs-login', [PortalLoginController::class, 'login'])->name('docs.login.submit');

//blog routes
Route::get('/fetch-blogs', [BlogController::class, 'fetchBlogs']);

Route::get('/fetch-blog-detail/{slug}', [BlogController::class, 'fetchBlogDetail']);
Route::get('/blog/{slug}', [BlogController::class, 'BlogDetail']);

//career routes
Route::get('/job-details/{slug}', [CareerController::class, 'jobDetail']);

// Internal API paths
Route::get('/fetch-jobs', [CareerController::class, 'fetchJobs']);
Route::get('/fetch-job-detail/{slug}', [CareerController::class, 'fetchJobDetail']);
//page routes
Route::get('/{page}', function ($page) {
    if (view()->exists('pages.' . $page)) {
        return view('pages.' . $page);
    }
    abort(404);
});

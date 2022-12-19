<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\smartfinanceController;
use App\Http\Controllers\loanController;
use App\Http\Controllers\taxController;
use App\Http\Controllers\mutalFundController;
use App\Http\Controllers\insuranceController;
use App\Http\Controllers\cronController;
use App\Http\Controllers\generalController;


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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!!!";
 });

Route::get('/phpmyinfo', function () {
    phpinfo(); 
})->name('phpmyinfo');

Route::get('/cron', function() {
    Artisan::call('schedule:run');
    return "Worked!!!";
 });
 

//Welcome
Route::get('/',[registerController::class, 'home'])->name('home');
//End welcome

//Register
Route::get('/sign_up',[registerController::class, 'sign_up'])->name('sign_up');
Route::post('/register',[registerController::class, 'register'])->name('register');
//Register End


//Login
Route::get('/sign_in',[loginController::class, 'sign_in'])->name('sign_in');
Route::post('/login',[loginController::class, 'login'])->name('login');
Route::post('/forgot_password',[loginController::class, 'forgot_password'])->name('forgot_password');
Route::get('/change_password',[loginController::class, 'change_password'])->name('change_password');
Route::post('/save_password',[loginController::class, 'save_password'])->name('save_password');

//Login End

//Dashboard Pages
Route::get('/user_management',[UserController::class, 'user_management'])->name('user_management');
Route::get('/finance',[UserController::class, 'finance'])->name('finance');
Route::get('/loan',[UserController::class, 'loan'])->name('loan');
Route::get('/tax',[UserController::class, 'tax'])->name('tax');
Route::get('/mutual_fund',[UserController::class, 'mutual_fund'])->name('mutual_fund');
Route::get('/insurance',[UserController::class, 'insurance'])->name('insurance');

//User Management
Route::get('/dashboard',[UserController::class, 'dashboard'])->name('dashboard');
Route::get('/get_user',[UserController::class, 'get_user'])->name('get_user');
Route::post('/change_user_status',[UserController::class, 'change_user_status'])->name('change_user_status');
Route::get('/profile',[UserController::class, 'profile'])->name('profile');
Route::get('/user/{id}/{flag}/',[UserController::class, 'user'])->name('user');
Route::get('/approve_user/{id}/',[UserController::class, 'approve_user'])->name('approve_user');
Route::get('/approve_user_profile/{id}/',[UserController::class, 'approve_user_profile'])->name('approve_user_profile');

Route::get('/user_search/{type}',[UserController::class, 'user_search'])->name('user_search');
Route::get('/user_status/{type}',[UserController::class, 'user_status'])->name('user_status');
Route::get('/user_progress/{type}',[UserController::class, 'user_progress'])->name('user_progress');
Route::get('/user_profile/{type}',[UserController::class, 'user_profile'])->name('user_profile');
Route::get('/user_role/{type}/',[UserController::class, 'user_role'])->name('user_role');
Route::post('/save_profile',[UserController::class, 'save_profile'])->name('save_profile');
Route::post('/edit_profile',[UserController::class, 'edit_profile'])->name('edit_profile');
Route::get('/get_users',[UserController::class, 'get_users'])->name('get_users');
Route::post('/refferal',[UserController::class, 'refferal'])->name('refferal');
Route::get('/refferal_amount',[UserController::class, 'refferal_amount'])->name('refferal_amount');
Route::post('/store_review_rating',[UserController::class, 'store_review_rating'])->name('store_review_rating');
Route::post('/edit_review_rating',[UserController::class, 'edit_review_rating'])->name('edit_review_rating');
Route::get('/accept_review_rating/{id}',[UserController::class, 'accept_review_rating'])->name('accept_review_rating');
Route::get('/decline_review_rating/{id}',[UserController::class, 'decline_review_rating'])->name('decline_review_rating');
Route::get('/review_rating',[UserController::class, 'review_rating'])->name('review_rating');
//User Management end

//General
Route::get('/uploads',[generalController::class, 'uploads'])->name('uploads');
Route::post('/save_uploads',[generalController::class, 'save_uploads'])->name('save_uploads');
Route::get('/get_upload',[generalController::class, 'get_upload'])->name('get_upload');
Route::post('/update_banner',[generalController::class, 'update_banner'])->name('update_banner');
Route::post('/update_youtube',[generalController::class, 'update_youtube'])->name('update_youtube');
Route::get('/delete_upload/{id}',[generalController::class, 'delete_upload'])->name('delete_upload');
Route::get('/videos',[generalController::class, 'videos'])->name('videos');
Route::get('/email_templates',[generalController::class, 'email_templates'])->name('email_templates');
Route::post('/save_templates',[generalController::class, 'save_templates'])->name('save_templates');
Route::get('/edit_template/{id}',[generalController::class, 'edit_template'])->name('edit_template');
Route::post('/update_template',[generalController::class, 'update_template'])->name('update_template');
Route::get('/send_mail',[generalController::class, 'send_mail'])->name('send_mail');
Route::get('/settings',[generalController::class, 'settings'])->name('settings');
Route::post('/save_setting',[generalController::class, 'save_setting'])->name('save_setting');
Route::post('/save_social_media',[generalController::class, 'save_social_media'])->name('save_social_media');
Route::get('/delete_logo/{id}',[generalController::class, 'delete_logo'])->name('delete_logo');
Route::get('/get_logo',[generalController::class, 'get_logo'])->name('get_logo');
Route::get('/update_logo',[generalController::class, 'update_logo'])->name('update_logo');
Route::post('/save_html_pages',[generalController::class, 'save_html_pages'])->name('save_html_pages');
Route::get('/loan_terms_and_condition',[generalController::class, 'loan_terms_and_condition'])->name('loan_terms_and_condition');
//General End

//Smart Finance

Route::post('/store_smart_finance',[SmartFinanceController::class, 'store_smart_finance'])->name('store_smart_finance');
Route::get('plan_type',[SmartFinanceController::class, 'plan_type'])->name('plan_type');
Route::get('/get_smart_finance',[SmartFinanceController::class, 'get_smart_finance'])->name('get_smart_finance');
Route::post('/approve_smart_finance',[SmartFinanceController::class, 'approve_smart_finance'])->name('approve_smart_finance');
Route::get('/reject_smart_finance',[SmartFinanceController::class, 'reject_smart_finance'])->name('reject_smart_finance');
Route::get('/view_finance/{id}/',[SmartFinanceController::class, 'view_finance'])->name('view_finance');
Route::get('/payment',[SmartFinanceController::class, 'payment'])->name('payment');
Route::get('/investment_search/{type}',[SmartFinanceController::class, 'investment_search'])->name('investment_search');
Route::get('/investment_status/{type}',[SmartFinanceController::class, 'investment_status'])->name('investment_status');
Route::get('/investment_plan/{type}',[SmartFinanceController::class, 'investment_plan'])->name('investment_plan');
Route::post('/store_next_month_payment',[SmartFinanceController::class, 'store_next_month_payment'])->name('store_next_month_payment');
Route::get('/get_smart_finance_payment',[SmartFinanceController::class, 'get_smart_finance_payment'])->name('get_smart_finance_payment');
Route::post('/approve_smart_finance_payment',[SmartFinanceController::class, 'approve_smart_finance_payment'])->name('approve_smart_finance_payment');
Route::get('/renewal_plan',[SmartFinanceController::class, 'renewal_plan'])->name('renewal_plan');
Route::post('/renewal_plan_year',[SmartFinanceController::class, 'renewal_plan_year'])->name('renewal_plan_year');
Route::get('payout_plan',[SmartFinanceController::class, 'payout_plan'])->name('payout_plan');
Route::post('/pro_book_upload',[SmartFinanceController::class, 'pro_book_upload'])->name('pro_book_upload');
Route::get('get_pro_book',[SmartFinanceController::class, 'get_pro_book'])->name('get_pro_book');
Route::get('payout_list',[SmartFinanceController::class, 'payout_list'])->name('payout_list');
Route::get('export-excel-csv-file/{slug}', [SmartFinanceController::class, 'exportExcelCSV']);
Route::post('/import_excel',[SmartFinanceController::class, 'import_excel'])->name('import_excel');

//Smart Finance end

//Loan

Route::post('/save_loan',[loanController::class, 'save_loan'])->name('save_loan');
Route::get('view_loan/{id}', [loanController::class, 'view_loan'])->name('view_loan');
Route::get('get_loan', [loanController::class, 'get_loan'])->name('get_loan');
Route::post('loan_edit', [loanController::class, 'loan_edit'])->name('loan_edit');
Route::get('check_loan_payment', [loanController::class, 'check_loan_payment'])->name('check_loan_payment');
Route::post('/loan_payment',[loanController::class, 'loan_payment'])->name('loan_payment');
Route::get('get_loan_payment', [loanController::class, 'get_loan_payment'])->name('get_loan_payment');
Route::post('/loan_payment_approve',[loanController::class, 'loan_payment_approve'])->name('loan_payment_approve');
Route::get('/loan_search/{type}',[loanController::class, 'loan_search'])->name('loan_search');
Route::get('/loan_status/{type}',[loanController::class, 'loan_status'])->name('loan_status');
Route::get('/close_loan/{id}',[loanController::class, 'close_loan'])->name('close_loan');
Route::get('/renewal_loan/{id}',[loanController::class, 'renewal_loan'])->name('renewal_loan');
//Loan End

//Tax
Route::post('/save_tax',[taxController::class, 'save_tax'])->name('save_tax');
Route::get('/view_tax/{id}',[taxController::class, 'view_tax'])->name('view_tax');
Route::post('/update_password',[taxController::class, 'update_password'])->name('update_password');
Route::post('/save_acknowledgement',[taxController::class, 'save_acknowledgement'])->name('save_acknowledgement');
//Tax End

//Mutal Fund
Route::post('/send_enquiry',[mutalFundController::class, 'send_enquiry'])->name('send_enquiry');
//End

//Insurance
Route::post('/save_insurance',[insuranceController::class, 'save_insurance'])->name('save_insurance');
Route::get('/view_insurance/{id}',[insuranceController::class, 'view_insurance'])->name('view_insurance');
Route::get('/insurance_enquiry',[insuranceController::class, 'insurance_enquiry'])->name('insurance_enquiry');

//Cron
Route::get('/testing',[cronController::class, 'testing'])->name('testing');


//Logout
Route::get('/logout',[loginController::class, 'logout'])->name('logout');
//End Logout





<?php

use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Auth\TwoFactorAuthenticationController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Lang\LanguageController;
use App\Http\Controllers\User\ResumeController;
use App\Livewire\Admin\Category\CategoryList;
use App\Livewire\Admin\FAQ\FAQCreate;
use App\Livewire\Admin\FAQ\FAQEdit;
use App\Livewire\Admin\FAQ\FAQList;
use App\Livewire\Admin\Home\Dashboard;
use App\Livewire\Admin\Job\JobCreate;
use App\Livewire\Admin\Job\JobDelete;
use App\Livewire\Admin\Job\JobEdit;
use App\Livewire\Admin\Job\JobList;
use App\Livewire\Admin\Notification\NotificationList;
use App\Livewire\Admin\RolePermission\RoleSetting;
use App\Livewire\Admin\Setting\SettingList;
use App\Livewire\Admin\TrendingWord\TrendingWordList;
use App\Livewire\Admin\User\ChangePassword;
use App\Livewire\Admin\User\UserList;
use App\Livewire\Admin\User\UserProfile as AdminUserProfile;
use App\Livewire\User\Company\CompanyDetail;
use App\Livewire\User\Company\CompanyList;
use App\Livewire\User\Contact\ContactComponent;
use App\Livewire\User\FAQ\FAQList as UserFAQList;
use App\Livewire\User\Home\HomePage;
use App\Livewire\User\Job\Detail\JobDetail;
use App\Livewire\User\Job\JobApplication;
use App\Livewire\User\Job\JobList as UserJobList;
use App\Livewire\User\PrivacyPolicy\PrivacyPolicyComponent;
use App\Livewire\User\Student\StudentList;
use App\Livewire\User\TermAndCondition\TermAndConditionComponent;
use App\Livewire\User\User\Company\CompanyProfile;
use App\Livewire\User\User\Company\Job\JobCreate as CompanyJobCreate;
use App\Livewire\User\User\Company\Job\JobEdit as CompanyJobEdit;
use App\Livewire\User\User\Company\Job\JobList as CompanyJobList;
use App\Livewire\User\User\Student\StudentApplicationJob;
use App\Livewire\User\User\Student\StudentProfile;
use App\Livewire\User\User\Student\StudentResume;
use App\Livewire\User\User\Student\StudentWishlistJob;
use App\Livewire\User\User\UserChangePassword;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Authentication Routes */
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class,'login']);
Route::post('logout', [LoginController::class,'logout'])->name('logout');

/* Registration Routes */
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

/* Password Reset Routes */
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

/* Confirm Password */
Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);

/* Email Verification Routes */
Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::get('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

Route::group(['prefix' => '2fa'], function () {
    Route::get('/', [TwoFactorAuthenticationController::class, 'show2faForm'])->name('show2faForm');
    Route::post('/generate-secret', [TwoFactorAuthenticationController::class, 'generate2faSecret'])->name('generate2faSecret');
    Route::post('/enable-2fa', [TwoFactorAuthenticationController::class, 'enable2fa'])->name('enable2fa');
    Route::post('/disable-2fa', [TwoFactorAuthenticationController::class, 'disable2fa'])->name('disable2fa');
    Route::post('/2fa-verify', [TwoFactorAuthenticationController::class, 'verify2fa'])->name('verify2fa')->middleware('2fa');
});

Route::get('auth/{provider}/redirect', [SocialiteController::class, 'redirect'])->name('socialite.redirect');
Route::get('auth/{provider}/callback', [SocialiteController::class, 'callback'])->name('socialite.callback');

/* Lang */
Route::get('lang/{locale}', [LanguageController::class, '__invoke'])->name('language.__invoke');

/* Admin */
Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'verified', '2fa']], function () {
    Route::get('/', Dashboard::class)->name('dashboard')->middleware('permission:dashboard');
    Route::get('/role-permission', RoleSetting::class)->name('role-permission')->middleware('permission:role-permission');
    Route::get('/user-profile/{id}', AdminUserProfile::class)->name('user-edit.profile')->middleware('permission:user-edit');
    Route::get('/user', UserList::class)->name('user.index')->middleware('permission:user-list');
    Route::get('/user-change-password', ChangePassword::class)->name('user-change-password.index')->middleware('password.confirm:password.confirm,1');
    Route::get('/job', JobList::class)->name('job.index')->middleware('permission:job-list');
    Route::get('/job-edit/{id}', JobEdit::class)->name('job.edit')->middleware('permission:job-edit');
    Route::get('/job-create', JobCreate::class)->name('job.create')->middleware('permission:job-create');
    Route::get('/job-delete', JobDelete::class)->name('job.delete')->middleware('permission:job-delete');
    Route::get('/category', CategoryList::class)->name('category.index')->middleware('permission:category-list');
    Route::get('/trending-word', TrendingWordList::class)->name('trending-word.index')->middleware('permission:trending-word-list');
    Route::get('/notification', NotificationList::class)->name('notification.index')->middleware('permission:notification-list');
    Route::get('/setting', SettingList::class)->name('setting.index')->middleware('permission:site-settings');
    Route::get('/faq', FAQList::class)->name('faq.index')->middleware('permission:faq-list');
    Route::get('/faq-create', FAQCreate::class)->name('faq.create')->middleware('permission:faq-create');
    Route::get('/faq-edit/{id}', FAQEdit::class)->name('faq.edit')->middleware('permission:faq-edit');
});

Route::get('/', HomePage::class)->name('home');
Route::get('/job-detail/{id}', JobDetail::class)->name('job-detail');
Route::get('/job-list', UserJobList::class)->name('job-list.user');
Route::get('/student-resume-preview/{id}', [ResumeController::class, '__invoke'])->name('user-resume-preview.user');
Route::get('/company-list', CompanyList::class)->name('company-list.user');
Route::get('/company-detail/{id}', CompanyDetail::class)->name('company-detail.user');
Route::get('/student-list', StudentList::class)->name('student-list.user');
Route::get('/faq-list', UserFAQList::class)->name('faq-list.user');
Route::get('/term-and-conditions', TermAndConditionComponent::class)->name('term-and-condition.user');
Route::get('/privacy-policy', PrivacyPolicyComponent::class)->name('privacy-policy.user');
Route::get('/contact-us', ContactComponent::class)->name('contact-us.user');

Route::group(['middleware' => ['auth', 'verified', '2fa']], function () {
    Route::get('/user-change-password', UserChangePassword::class)->name('user-change-password.user')->middleware('password.confirm:password.confirm,1');

    Route::get('/job-application/{id}', JobApplication::class)->name('job-applied.user')->middleware('permission:student-job-applied');
    Route::get('/student-profile', StudentProfile::class)->name('student-profile.user')->middleware('permission:student-profile-create');
    Route::get('/wishlist-job', StudentWishlistJob::class)->name('student-wishlist.user')->middleware('permission:student-job-wishlist');
    Route::get('/student-resume', StudentResume::class)->name('student-resume.user')->middleware('permission:student-resume-create');
    Route::get('/applied-job', StudentApplicationJob::class)->name('student-applied-job.user')->middleware('permission:student-job-applied');

    Route::get('/company-profile', CompanyProfile::class)->name('company-profile.user')->middleware('permission:company-profile-create');
    Route::get('/company-job-create', CompanyJobCreate::class)->name('company-job-create.user')->middleware('permission:company-job-create');
    Route::get('/company-job-list', CompanyJobList::class)->name('company-job-list.user')->middleware('permission:company-job-list');
    Route::get('/company-job-edit/{id}', CompanyJobEdit::class)->name('company-job-edit.user')->middleware('permission:company-job-edit');
});

<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Be\DashboardController;

use App\Http\Controllers\Be\PicController;
use App\Http\Controllers\Be\FirmController;
use App\Http\Controllers\Be\ProductController;
use App\Http\Controllers\Be\EnablerController;
use App\Http\Controllers\Be\PartnerController;
use App\Http\Controllers\Be\RoleController;
use App\Http\Controllers\Be\PermissionController;
use App\Http\Controllers\Be\UserController;
use App\Http\Controllers\Be\ProvinceController;
use App\Http\Controllers\Be\RegencyController;
use App\Http\Controllers\Be\DistrictController;
use App\Http\Controllers\Be\VillageController;
use App\Http\Controllers\Be\GenderController;
use App\Http\Controllers\Be\BentityController;
use App\Http\Controllers\Be\TovercatController;
use App\Http\Controllers\Be\InvneedController;
use App\Http\Controllers\Be\CommoditycatController;
use App\Http\Controllers\Be\FrontController;
use App\Http\Controllers\Be\HowweworkController;
use App\Http\Controllers\Be\SliderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('lang/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});

Route::get('/', [App\Http\Controllers\Fe\FrontpageController::class, 'index'])->name('frontpage');

Route::get('/tentang-kami', [App\Http\Controllers\Fe\AboutController::class, 'index'])->name('about_index');
Route::get('/about-us', [App\Http\Controllers\Fe\AboutController::class, 'index'])->name('about_index');

Route::get('/usaha', [App\Http\Controllers\Fe\FirmController::class, 'index'])->name('firms_index');
Route::get('/businesses', [App\Http\Controllers\Fe\FirmController::class, 'index'])->name('firms_index');
Route::get('/usaha/detail/{slug}', [App\Http\Controllers\Fe\FirmController::class, 'show'])->name('firms_show');
Route::get('/businesses/detail/{slug}', [App\Http\Controllers\Fe\FirmController::class, 'show'])->name('firms_show');


Route::get('/enabler', [App\Http\Controllers\Fe\EnablerController::class, 'index'])->name('enablers_index');
Route::get('/enablers', [App\Http\Controllers\Fe\EnablerController::class, 'index'])->name('enablers_index');

Route::get('/peta', [App\Http\Controllers\Fe\PetaController::class, 'index'])->name('peta_index');
Route::get('/map', [App\Http\Controllers\Fe\PetaController::class, 'index'])->name('map_index');

Route::get('/syarat', [App\Http\Controllers\Fe\SyaratController::class, 'index'])->name('syarat_index');
Route::get('/terms', [App\Http\Controllers\Fe\SyaratController::class, 'index'])->name('terms_index');

Route::get('/question', [App\Http\Controllers\Fe\QuestionController::class, 'index'])->name('question_index');
Route::get('/questions', [App\Http\Controllers\Fe\QuestionController::class, 'index'])->name('questions_index');

Route::get('/produk', [App\Http\Controllers\Fe\ProductController::class, 'index'])->name('products_index');
Route::get('/products', [App\Http\Controllers\Fe\ProductController::class, 'index'])->name('products_index');
Route::get('/produk/detail/{slug}', [App\Http\Controllers\Fe\ProductController::class, 'show'])->name('products_show');
Route::get('/products/detail/{slug}', [App\Http\Controllers\Fe\ProductController::class, 'show'])->name('products_show');

Route::get('/cari', [App\Http\Controllers\Fe\SearchController::class, 'index'])->name('search_id_index');
Route::get('/search', [App\Http\Controllers\Fe\SearchController::class, 'index'])->name('search_en_index');

Route::get('/hasil-pencarian', [App\Http\Controllers\Fe\SearchController::class, 'show'])->name('searchresult_id_index');
Route::get('/search-result', [App\Http\Controllers\Fe\SearchController::class, 'show'])->name('searchresult_en_index');

// Route::post('/fetch-provinces', [App\Http\Controllers\Fe\ChooseareaController::class, 'fetchProvince']); //province
Route::post('/fetch-regencies', [App\Http\Controllers\Fe\ChooseareaController::class, 'fetchRegency']); //regency
Route::post('/fetch-districts', [App\Http\Controllers\Fe\ChooseareaController::class, 'fetchDistrict']);  //district

// Auth::routes();
Auth::routes(['verify' => true]);

// MEMBER AREA start -----------------------------------------------------------------------------------------------------------------------------
    // Route::group(['prefix' => 'member', 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'member', 'middleware' => 'auth', 'verified'], function () {
        Route::get('/dashboard', [App\Http\Controllers\Fe\MemberController::class, 'index'])->name('member_dashboard');

        // Member Profile
        Route::get('/profile',        [App\Http\Controllers\Fe\MemberController::class,  'show'])->name('member_profile');
        Route::get('/profile/edit',   [App\Http\Controllers\Fe\MemberController::class,  'edit'])->name('member_profile_edit');
        Route::put('/profile/update', [App\Http\Controllers\Fe\MemberController::class,'update'])->name('member_profile_update');
        Route::get('/profile/create', [App\Http\Controllers\Fe\MemberController::class,'create'])->name('member_profile_create');
        Route::post('/profile/store', [App\Http\Controllers\Fe\MemberController::class, 'store'])->name('member_profile_store');

        // Firm Profile
        Route::get('/firm',        [App\Http\Controllers\Fe\MemberfirmController::class,   'show'])->name('member_firm');
        Route::get('/firm/edit',   [App\Http\Controllers\Fe\MemberfirmController::class,   'edit'])->name('member_firm_edit');
        Route::put('/firm/update', [App\Http\Controllers\Fe\MemberfirmController::class, 'update'])->name('member_firm_update');
        Route::get('/firm/create', [App\Http\Controllers\Fe\MemberfirmController::class, 'create'])->name('member_firm_create');
        Route::post('/firm/store', [App\Http\Controllers\Fe\MemberfirmController::class,  'store'])->name('member_firm_store');

        // Products
        Route::get('/products', [App\Http\Controllers\Fe\MemberproductController::class, 'index'])->name('member_product_index');
        Route::get('/products/show/{id}', [App\Http\Controllers\Fe\MemberproductController::class, 'show'])->name('member_product_show');
        Route::get('/products/edit/{id}', [App\Http\Controllers\Fe\MemberproductController::class, 'edit'])->name('member_product_edit');
        Route::put('/products/update/{id}', [App\Http\Controllers\Fe\MemberproductController::class,'update'])->name('member_product_update');
        Route::get('/products/photo/delete/{id}/{photo}', [App\Http\Controllers\Fe\MemberproductController::class,'delete'])->name('member_product_delete_photo');
        Route::get('/product/create', [App\Http\Controllers\Fe\MemberproductController::class, 'create'])->name('member_product_create');
        Route::post('/product/store', [App\Http\Controllers\Fe\MemberproductController::class,  'store'])->name('member_product_store');

        // Change Password
        Route::get('/password', [App\Http\Controllers\Fe\MemberpasswordController::class, 'edit'])->name('member_password');
        Route::put('/password/update', [App\Http\Controllers\Fe\MemberpasswordController::class, 'update'])->name('member_password_update');

    });
// MEMBER AREA end ===============================================================================================================================

// ADMIN STAFF AREA start ------------------------------------------------------------------------------------------------------------------------
    Route::group(['prefix' => config('app.admin_uri'), 'middleware' => 'auth'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('adm_home');

        Route::resource('/frontpage', FrontController::class);
        Route::resource('/howwework', HowweworkController::class);
        Route::resource('/sliders', SliderController::class);

        Route::resource('/pics', PicController::class);
        Route::resource('/firms', FirmController::class);
        Route::get(     '/products/{id}/delphoto/{photonum}', [ProductController::class, 'delete_photo'])->name('delete_photo');
        Route::resource('/products', ProductController::class);
        Route::resource('/enablers', EnablerController::class);
        Route::resource('/partners', PartnerController::class);

        // USER START ---------------------------------------------------------
        Route::resource('/users/roles',       RoleController::class);
        Route::resource('/users/permissions', PermissionController::class);
        Route::resource('/users/users',       UserController::class);
        // USER END ===========================================================

        // MASTER START -------------------------------------------------------
        Route::get(     '/master/zone/provinces/json',  [ProvinceController::class, 'json'])->name('province_json');
        Route::resource('/master/zone/provinces',       ProvinceController::class);
        Route::get(     '/master/zone/regencies/json',  [RegencyController::class, 'json'])->name('regency_json');
        Route::resource('/master/zone/regencies',       RegencyController::class);
        Route::get(     '/master/zone/districts/json',  [DistrictController::class, 'json'])->name('district_json');
        Route::resource('/master/zone/districts',       DistrictController::class);
        Route::get(     '/master/zone/villages/json',   [VillageController::class, 'json'])->name('village_json');
        Route::resource('/master/zone/villages',        VillageController::class);
        Route::resource('/master/app/genders',          GenderController::class);
        Route::resource('/master/app/bentities',        BentityController::class);
        Route::resource('/master/app/tovercats',        TovercatController::class);
        Route::resource('/master/app/invneeds',         InvneedController::class);
        Route::resource('/master/app/commoditycats',    CommoditycatController::class);
        // MASTER END =========================================================
    });
// ADMIN STAFF AREA end ==========================================================================================================================

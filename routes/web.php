<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TypePostController;
use App\Http\Controllers\TypeNewsCastController;
use App\Http\Controllers\NewsCastController;
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
    return view('layouts.admin');
});
//Đăng nhập
Route::get('/dang-ky',[AccountController::class,'dangKy'])->name('dang-ky')->middleware('guest');
Route::get('/active-account/{account}/{token}',[AccountController::class,'active'])->name('kich-hoat');
Route::get('/revefiry-account/{account}/{token}',[AccountController::class,'reVerifyAccount'])->name('kich-hoat-lai-tai-khoan');
Route::post('/dang-ky',[AccountController::class,'xuliDangKy'])->name('xu-li-dang-ky');
Route::post('/dang-nhap',[AccountController::class,'xulyDangNhap'])->name('xu-ly-dang-nhap')->middleware('guest');
Route::get('/dang-nhap',[AccountController::class,'dangNhap'])->name('dang-nhap')->middleware('guest');

Route::get('/dang-xuat',[AccountController::class,'dangXuat'])->middleware('auth');
//Có trang chủ của người dùng ở dưới cùng á k xài mà độ thêm dô chi. thêm dô nó thành sai route nên k vào đc :v
///////////////////////////////////////////////////////


//Quên mật khẩu 
Route::get('/quen-mat-khau',[AccountController::class,'quenMatkhau'])->name('quen-mat-khau')->middleware('guest');
Route::post('/quen-mat-khau',[AccountController::class,'xulyQuenmatkhau'])->name('xu-ly-quen-mat-khau');
Route::get('/lay-mat-khau/{account}/{token_password}',[AccountController::class,'layMatkhau'])->name('lay-mat-khau')->middleware('guest');
Route::post('/lay-mat-khau/{account}',[AccountController::class,'xylylayMatkhau'])->name('xu-ly-lay-mat-khau');


Route::get('/admin/user/danh-sach',[AccountController::class,"index"]);
Route::get('/admin/user/chi-tiet/{id}',[AccountController::class,"show"])->name('chi-tiet-tai-khoan');
Route::get('/admin/user/them-moi',[AccountController::class,"create"])->name('them-moi-nguoi-dung');

Route::post('/admin/user/them-moi',[AccountController::class,"store"])->name('xu-li-them-moi-nguoi-dung');
Route::get('/admin/user/cap-nhat/{id}',[AccountController::class,"edit"])->name('cap-nhat-tai-khoan');
Route::post('/admin/user/cap-nhat/{id}',[AccountController::class,"update"])->name('xu-li-cap-nhat-tai-khoan');
Route::get('/admin/user/xoa/{id}',[AccountController::class,"destroy"]);

Route::prefix('admin/item/catalogue')->group(function () {
    Route::get('danh-sach',[CatalogueController::class,"index"]);
    Route::get('them-moi',[CatalogueController::class,"create"])->name('them-moi-danh-muc-tim-do');
    Route::post('them-moi',[CatalogueController::class,"store"])->name('xu-li-them-moi-danh-muc-tim-do');
    Route::get('cap-nhat/{id}',[CatalogueController::class,"edit"])->name('cap-nhat-danh-muc-tim-do');
    Route::post('cap-nhat/{id}',[CatalogueController::class,"update"])->name('xu-li-cap-nhat-danh-muc-tim-do');
    Route::get('chi-tiet/{id}',[CatalogueController::class,"show"])->name('chi-tiet-danh-muc-tim-do');
    Route::get('xoa/{id}',[CatalogueController::class,"destroy"]);
});

Route::prefix('admin/post')->group(function () {
    Route::get('danh-sach',[PostController::class,"index"]);
    Route::get('them-moi',[PostController::class,"create"])->name('them-moi-bai-dang');
    Route::post('them-moi',[PostController::class,"store"])->name('xu-li-them-moi-bai-dang');
    Route::get('cap-nhat/{id}',[PostController::class,"edit"])->name('cap-nhat-bai-dang');
    Route::post('cap-nhat/{id}',[PostController::class,"update"])->name('xu-li-cap-nhat-bai-dang');
    Route::get('chi-tiet/{id}',[PostController::class,"show"])->name('chi-tiet-bai-dang');
    Route::get('xoa/{id}',[PostController::class,"destroy"]);
});

Route::prefix('admin/type-post')->group(function () {
    Route::get('danh-sach',[TypePostController::class,"index"]);
    Route::get('them-moi',[TypePostController::class,"create"])->name('them-moi-loai-bai-dang');
    Route::post('them-moi',[TypePostController::class,"store"])->name('xu-li-them-moi-loai-bai-dang');
    Route::get('cap-nhat/{id}',[TypePostController::class,"edit"])->name('cap-nhat-loai-bai-dang');
    Route::post('cap-nhat/{id}',[TypePostController::class,"update"])->name('xu-li-cap-nhat-loai-bai-dang');
    Route::get('chi-tiet/{id}',[TypePostController::class,"show"])->name('chi-tiet-loai-bai-dang');
    Route::get('xoa/{id}',[TypePostController::class,"destroy"]);
});


Route::prefix('admin/news-cast')->group(function () {
    Route::get('danh-sach/{name}',[NewsCastController::class,"index"]);
    Route::get('them-moi',[NewsCastController::class,"create"])->name('them-moi-ban-tin');
    Route::post('them-moi',[NewsCastController::class,"store"])->name('xu-li-them-moi-ban-tin');
    Route::get('cap-nhat/{id}',[NewsCastController::class,"edit"])->name('cap-nhat-ban-tin');
    Route::post('cap-nhat/{id}',[NewsCastController::class,"update"])->name('xu-li-cap-nhat-ban-tin');
    Route::get('chi-tiet/{id}',[NewsCastController::class,"show"])->name('chi-tiet-ban-tin');
    Route::get('xoa/{id}',[NewsCastController::class,"destroy"]);
});

Route::prefix('admin/type-news-cast')->group(function () {
    Route::get('danh-sach',[TypeNewsCastController::class,"index"]);
    Route::get('them-moi',[TypeNewsCastController::class,"create"])->name('them-moi-loai-ban-tin');
    Route::post('them-moi',[TypeNewsCastController::class,"store"])->name('xu-li-them-moi-loai-ban-tin');
    Route::get('cap-nhat/{id}',[TypeNewsCastController::class,"edit"])->name('cap-nhat-loai-ban-tin');
    Route::post('cap-nhat/{id}',[TypeNewsCastController::class,"update"])->name('xu-li-cap-nhat-loai-ban-tin');
    Route::get('chi-tiet/{id}',[TypeNewsCastController::class,"show"])->name('chi-tiet-loai-ban-tin');
    Route::get('xoa/{id}',[TypeNewsCastController::class,"destroy"]);
});

Route::prefix('user')->group(function(){
    Route::get('trang-chu',[UserController::class,'index'])->name('trang-chu-nguoi-dung')->middleware('auth');// Đây nè
    Route::get('dang-bai',[UserController::class,'createpost'])->name('dang-bai');
    Route::post('dang-bai',[UserController::class,'storepost'])->name('xu-li-dang-bai');
    Route::get('profile-update/{id}',[UserController::class,"edit"])->name('cap-nhat-thong-tin-user');
    Route::post('profile-update/{id}',[UserController::class,"update"])->name('xu-li-cap-nhat-thong-tin-user');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

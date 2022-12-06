<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TypePostController;
use App\Http\Controllers\TypeNewsCastController;
use App\Http\Controllers\NewsCastController;
use App\Http\Controllers\MessageController;

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

//Đăng nhập
Route::get('/dang-ky',[AccountController::class,'dangKy'])->name('dang-ky')->middleware('guest');
Route::get('/active-account/{account}/{token}',[AccountController::class,'active'])->name('kich-hoat');
Route::get('/revefiry-account/{account}/{token}',[AccountController::class,'reVerifyAccount'])->name('kich-hoat-lai-tai-khoan');
Route::post('/dang-ky',[AccountController::class,'xuliDangKy'])->name('xu-li-dang-ky');
Route::post('/dang-nhap',[AccountController::class,'xulyDangNhap'])->name('xu-ly-dang-nhap')->middleware('guest');
Route::get('/dang-nhap',[AccountController::class,'dangNhap'])->name('dang-nhap')->middleware('guest');

Route::get('/dang-xuat',[AccountController::class,'dangXuat'])->middleware(['auth','role']);
//Có trang chủ của người dùng ở dưới cùng á k xài mà độ thêm dô chi. thêm dô nó thành sai route nên k vào đc :v
///////////////////////////////////////////////////////

Route::prefix('admin')->middleware(['auth','role'])->group(function(){
    Route::get('/dashboard', function () {
        return view('layouts.admin');
    });
    Route::prefix('user')->group(function(){
        Route::get('danh-sach',[AccountController::class,"index"]);
        Route::get('getlistaccounts',[AccountController::class,"getData"])->name('users.datatable');


        Route::get('chi-tiet/{id}',[AccountController::class,"show"])->name('chi-tiet-tai-khoan');
        Route::get('them-moi',[AccountController::class,"create"])->name('them-moi-nguoi-dung');

        Route::post('them-moi',[AccountController::class,"store"])->name('xu-li-them-moi-nguoi-dung');
        Route::get('cap-nhat/{id}',[AccountController::class,"edit"])->name('cap-nhat-tai-khoan');
        Route::post('cap-nhat/{id}',[AccountController::class,"update"])->name('xu-li-cap-nhat-tai-khoan');
        Route::get('xoa/{id}',[AccountController::class,"destroy"]);
    });
    Route::prefix('item/catalogue')->group(function () {
        Route::get('danh-sach',[CatalogueController::class,"index"]);
        Route::get('danh-sach/getlistcatalogue',[CatalogueController::class,"getData"])->name('catalogue.datatable');
        Route::get('them-moi',[CatalogueController::class,"create"])->name('them-moi-danh-muc-tim-do');
        Route::post('them-moi',[CatalogueController::class,"store"])->name('xu-li-them-moi-danh-muc-tim-do');
        Route::get('cap-nhat/{id}',[CatalogueController::class,"edit"])->name('cap-nhat-danh-muc-tim-do');
        Route::post('cap-nhat/{id}',[CatalogueController::class,"update"])->name('xu-li-cap-nhat-danh-muc-tim-do');
        Route::get('chi-tiet/{id}',[CatalogueController::class,"show"])->name('chi-tiet-danh-muc-tim-do');
        Route::get('xoa/{id}',[CatalogueController::class,"destroy"]);
    });
    Route::prefix('post')->group(function () {
        Route::get('danh-sach',[PostController::class,"index"]);
        Route::get('danh-sach/getlistpost',[PostController::class,"getData"])->name('post.datatable');
        Route::get('them-moi',[PostController::class,"create"])->name('them-moi-bai-dang');
        Route::post('them-moi',[PostController::class,"store"])->name('xu-li-them-moi-bai-dang');
        Route::get('cap-nhat/{id}',[PostController::class,"edit"])->name('cap-nhat-bai-dang');
        Route::post('cap-nhat/{id}',[PostController::class,"update"])->name('xu-li-cap-nhat-bai-dang');
        Route::get('chi-tiet/{id}',[PostController::class,"show"])->name('chi-tiet-bai-dang');
        Route::get('xoa/{id}',[PostController::class,"destroy"]);
    });
    Route::prefix('type-post')->group(function () {
        Route::get('danh-sach',[TypePostController::class,"index"]);
        Route::get('danh-sach/getlistypepost',[TypePostController::class,"getData"])->name('typepost.datatable');
        Route::get('them-moi',[TypePostController::class,"create"])->name('them-moi-loai-bai-dang');
        Route::post('them-moi',[TypePostController::class,"store"])->name('xu-li-them-moi-loai-bai-dang');
        Route::get('cap-nhat/{id}',[TypePostController::class,"edit"])->name('cap-nhat-loai-bai-dang');
        Route::post('cap-nhat/{id}',[TypePostController::class,"update"])->name('xu-li-cap-nhat-loai-bai-dang');
        Route::get('chi-tiet/{id}',[TypePostController::class,"show"])->name('chi-tiet-loai-bai-dang');
        Route::get('xoa/{id}',[TypePostController::class,"destroy"]);
    });
    Route::prefix('news-cast')->group(function () {
        Route::get('danh-sach/{name}',[NewsCastController::class,"index"]);
        Route::get('danh-sach/{name}/getlistnewscast',[NewsCastController::class,"getData"])->name('newscast.datatable');
        Route::get('them-moi',[NewsCastController::class,"create"])->name('them-moi-ban-tin');
        Route::post('them-moi',[NewsCastController::class,"store"])->name('xu-li-them-moi-ban-tin');
        Route::get('cap-nhat/{id}',[NewsCastController::class,"edit"])->name('cap-nhat-ban-tin');
        Route::post('cap-nhat/{id}',[NewsCastController::class,"update"])->name('xu-li-cap-nhat-ban-tin');
        Route::get('chi-tiet/{id}',[NewsCastController::class,"show"])->name('chi-tiet-ban-tin');
        Route::get('xoa/{id}',[NewsCastController::class,"destroy"]);
    });
    Route::prefix('type-news-cast')->group(function () {
        Route::get('danh-sach',[TypeNewsCastController::class,"index"]);
        Route::get('danh-sach/getlisttypenewscast',[TypeNewsCastController::class,"getData"])->name('typenewscast.datatable');
        Route::get('them-moi',[TypeNewsCastController::class,"create"])->name('them-moi-loai-ban-tin');
        Route::post('them-moi',[TypeNewsCastController::class,"store"])->name('xu-li-them-moi-loai-ban-tin');
        Route::get('cap-nhat/{id}',[TypeNewsCastController::class,"edit"])->name('cap-nhat-loai-ban-tin');
        Route::post('cap-nhat/{id}',[TypeNewsCastController::class,"update"])->name('xu-li-cap-nhat-loai-ban-tin');
        Route::get('chi-tiet/{id}',[TypeNewsCastController::class,"show"])->name('chi-tiet-loai-ban-tin');
        Route::get('xoa/{id}',[TypeNewsCastController::class,"destroy"]);
    });
    Route::get('report/detail/{id}',[PostController::class,'detail_report']);
});











Route::get('/',[UserController::class,'home'])->name('home')->middleware('guest');// Đây nè

Route::prefix('user')->middleware(['auth','role'])->group(function(){
    Route::get('trang-chu',[UserController::class,'index'])->name('trang-chu-nguoi-dung');// Đây nè
    Route::get('tim-kiem',[UserController::class,'searchpost'])->name('tim-kiem-bai-dang');
    Route::get('dang-bai',[UserController::class,'createpost'])->name('dang-bai');

    Route::post('dang-bai',[UserController::class,'storepost'])->name('xu-li-dang-bai');
    Route::post('sua-bai-dang/{post}',[UserController::class,'editPost'])->name('cap-nhat-bai-dang-cua-nguoi-dung');
    Route::post('update-post/{post}',[UserController::class,'updatePost'])->name('xu-li-cap-nhat-bai-dang-cua-nguoi-dung');
    Route::post('delete-post/{post}',[UserController::class,'destroyPost'])->name('xoa-bai-dang-cua-nguoi-dung');
    Route::get('profile-update/{id}',[UserController::class,"edit"])->name('cap-nhat-thong-tin-user');
    Route::post('profile-update/{id}',[UserController::class,"update"])->name('xu-li-cap-nhat-thong-tin-user');
    Route::post('follow-post',[UserController::class,"follow"])->name('theo-doi-bai-dang');
    // Route::post('report-post/{post}',[UserController::class,"report"])->name('bao-cao-bai-dang');
    Route::post('report-post',[UserController::class,"report"])->name('bao-cao-bai-dang');
    Route::get('message',[MessageController::class,"index"])->name('trang-chu-nhan-tin');
    Route::get('message/{room}',[MessageController::class,"show"])->name('message.detail');
    Route::post('message/send',[MessageController::class,"create"])->name('message.create');

});

Route::get('/news-cast/{type_id}',[NewsCastController::class,'getAll'])->name('newscast.newscast');
Route::get('/news-cast/detail/{type_id}/{id}',[NewsCastController::class,'detail'])->name('newscast.detail');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

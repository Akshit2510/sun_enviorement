<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsletterSubscribeController;
use App\Http\Controllers\BannerImagesController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductSpecificationController;
use App\Http\Controllers\ProductController;

Route::get('/', [FrontController::class,'index'])->name('front.index');
Route::get('/about-Us', [FrontController::class, 'about_Us'])->name('aboutUs');
Route::get('/contact-Us', [FrontController::class, 'contact_us'])->name('contactUs');
Route::post('/save/contact-Us', [FrontController::class, 'saveContactUs'])->name('save.contactUs');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/temples/{pageCode}', [FrontController::class, 'templePages'])->name('temple.pages');
Route::get('/activityPage/{pageCode}', [FrontController::class, 'Pages'])->name('pages');
Route::get('/front/news', [FrontController::class, 'news'])->name('front.news');
Route::get('/front/region', [FrontController::class, 'region'])->name('front.region');
Route::post('/newsletter-subscribe',[FrontController::class, 'newsletterSubscribe'])->name('newsletter-subscribe');

Route::group(['middleware' => 'auth'], function(){

    Route::get('/homePage', [HomeController::class, 'homePage'])->name('homePage');
    Route::post('/homePage/store', [HomeController::class, 'homePageStore'])->name('homePageStore');

    Route::any('setting/edit',[SettingController::class, 'edit'])->name('setting.edit');

    //product route
    Route::resource('product', ProductController::class)->only(['create', 'index', 'edit', 'update', 'store', 'destroy']);
    Route::get('productDatatable',[ProductController::class, 'productdata'])->name('productDatatable');

    //banner image route
    Route::get('bannerImages',[BannerImagesController::class, 'index'])->name('bannerImages.index');
    Route::get('bannerImagesDatatable',[BannerImagesController::class, 'bannerImagedata'])->name('bannerImageDatatable');
    Route::get('banner/create',[BannerImagesController::class, 'create'])->name('banner.create');
    Route::post('banner/store',[BannerImagesController::class, 'store'])->name('banner.store');
    Route::get('banner/edit/{id}',[BannerImagesController::class, 'edit'])->name('banner.edit');
    Route::post('banner/update',[BannerImagesController::class, 'update'])->name('banner.update');
    Route::delete('banner/delete/{id}', [BannerImagesController::class, 'bannerImagesDelete'])->name('delete.banner.image');
    

    //category image route
    Route::get('category',[CategoryController::class, 'index'])->name('category.index');
    Route::get('categorydata',[CategoryController::class, 'categorydata'])->name('categorydata');
    Route::get('category/create',[CategoryController::class, 'create'])->name('category.create');
    Route::post('category/store',[CategoryController::class, 'store'])->name('category.store');
    Route::get('category/edit/{id}',[CategoryController::class, 'edit'])->name('category.edit');
    Route::post('category/update',[CategoryController::class, 'update'])->name('category.update');
    Route::delete('category/delete/{id}', [CategoryController::class, 'dalete'])->name('delete.category');
    
    //category image route
    Route::get('product-specification',[ProductSpecificationController::class, 'index'])->name('product-specification.index');
    Route::get('ajax-product-specification',[ProductSpecificationController::class, 'productspecificationdata'])->name('product-specification-data');
    Route::get('product-specification/create',[ProductSpecificationController::class, 'create'])->name('product-specification.create');
    Route::post('product-specification/store',[ProductSpecificationController::class, 'store'])->name('product-specification.store');
    Route::get('product-specification/edit/{id}',[ProductSpecificationController::class, 'edit'])->name('product-specification.edit');
    Route::post('product-specification/update',[ProductSpecificationController::class, 'update'])->name('product-specification.update');
    Route::delete('product-specification/delete/{id}', [ProductSpecificationController::class, 'dalete'])->name('delete.product-specification');
    



    //banner image route
    Route::get('testimonial',[TestimonialController::class, 'index'])->name('testimonial.index');
    Route::get('testimonialDatatable',[TestimonialController::class, 'testimonialdata'])->name('testimonialDatatable');
    Route::get('testimonial/create',[TestimonialController::class, 'create'])->name('testimonial.create');
    Route::post('testimonial/store',[TestimonialController::class, 'store'])->name('testimonial.store');
    Route::get('testimonial/edit/{id}',[TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::post('testimonial/update',[TestimonialController::class, 'update'])->name('testimonial.update');
    Route::delete('testimonial/delete/{id}', [TestimonialController::class, 'testimonialDelete'])->name('delete.testimonial');
    
    //about us route
    Route::resource('aboutUs', AboutUsController::class);
   
    //news route
    Route::resource('news', NewsController::class);
    Route::get('newsDatatable',[NewsController::class, 'newsData'])->name('newsDatatable');

    //newsletter subscribers route
    Route::get('newsletterSubscribe',[NewsletterSubscribeController::class,'index'])->name('newsletterSubscribe.index');
    Route::get('newsletterSubscribeData',[NewsletterSubscribeController::class,'data'])->name('newsletterSubscribe.data');
});
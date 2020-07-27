<?php

use Illuminate\Support\Facades\Route;


//frontroutes

Route::get('/','Frontend\FrontController@index')->name('/');
Route::get('/bangla','Frontend\LanguageController@bangla')->name('bangla');
Route::get('/english','Frontend\LanguageController@english')->name('english');



//single post 
Route::get('/view-post/{id}/{slug}','Frontend\FrontController@singlePost');



//default
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//admin

Route::prefix('/admin')->group(function () {
	//admin auth routes start
	Route::get('/login', 'Backend\Auth\LoginController@showLoginForm')->name('admin.login');
   	Route::post('/login', 'Backend\Auth\LoginController@login');
   	Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');

   	Route::post('/logout', 'AdminController@logout')->name('admin.logout');
   	Route::get('/password/reset', 'Backend\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
   	Route::post('/password/email', 'Backend\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
   	Route::get('/password/reset/{token}', 'Backend\Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
   	Route::post('/password/reset', 'Backend\Auth\ResetPasswordController@reset')->name('admin.password.update');
   	//admin auth ends here

    //category start
    Route::get('/category','Backend\CategoryController@index')->name('category');
    Route::post('/store/category','Backend\CategoryController@store')->name('store.category');
    Route::get('/delete/category/{id}','Backend\CategoryController@softDelete')->name('category.soft.delete');
    Route::get('/edit/category/{id}','Backend\CategoryController@edit')->name('category.edit');
    Route::post('/update/category/{id}','Backend\CategoryController@update')->name('update.category');
    Route::get('/category/recycle/bin','Backend\CategoryController@recycleBin')->name('category.recycle.bin');
    Route::get('/category/undo/delete/{id}','Backend\CategoryController@undoDelete')->name('category.undo.delete');
    Route::get('/category/permanent/delete/{id}','Backend\CategoryController@permanentDelete')->name('category.permanent.delete');

    //subcategory
    Route::get('/subcategory','Backend\SubcategoryController@index')->name('subcategory');
    Route::post('/store/subcategory','Backend\SubcategoryController@store')->name('store.subcategory');
    Route::get('/delete/subcategory/{id}','Backend\SubcategoryController@softDelete')->name('subcategory.soft.delete');
    Route::get('/edit/subcategory/{id}','Backend\SubcategoryController@edit')->name('subcategory.edit');
    Route::post('/update/subcategory/{id}','Backend\SubcategoryController@update')->name('update.subcategory');
    Route::get('/subcategory/undo/delete/{id}','Backend\SubcategoryController@undoDelete')->name('subcategory.undo.delete');
    Route::get('/subcategory/permanent/delete/{id}','Backend\SubcategoryController@permanentDelete')->name('subcategory.permanent.delete');

    //division
    Route::get('/division','Backend\DivisionController@index')->name('division');
    Route::post('/store/division','Backend\DivisionController@store')->name('store.division');
    Route::get('/edit/division/{id}','Backend\DivisionController@edit')->name('division.edit');
    Route::post('/update/division/{id}','Backend\DivisionController@update')->name('update.division');
    Route::get('/delete/division/{id}','Backend\DivisionController@softDelete')->name('division.soft.delete');
    Route::get('/division/recycle/bin','Backend\DivisionController@recycleBin')->name('division.recycle.bin');
    Route::get('/division/undo/delete/{id}','Backend\DivisionController@undoDelete')->name('division.undo.delete');
    Route::get('/division/permanent/delete/{id}','Backend\DivisionController@permanentDelete')->name('division.permanent.delete');


    //district
    Route::get('/district','Backend\DistrictController@index')->name('district');
    Route::post('/store/district','Backend\DistrictController@store')->name('store.district');
    Route::get('/edit/district/{id}','Backend\DistrictController@edit')->name('district.edit');
    Route::post('/update/district/{id}','Backend\DistrictController@update')->name('update.district');
    Route::get('/delete/district/{id}','Backend\DistrictController@softDelete')->name('district.soft.delete');
    Route::get('/district/undo/delete/{id}','Backend\DistrictController@undoDelete')->name('district.undo.delete');
    Route::get('/district/permanent/delete/{id}','Backend\DistrictController@permanentDelete')->name('district.permanent.delete');


    //post multiple dependency for subcat and district
    Route::get('/get/subcategory/{category_id}','Backend\PostController@getSubcategory')->name('get.subcategory');
    Route::get('/get/district/{division_id}','Backend\PostController@getDistrict')->name('get.district');


    //post
    Route::get('/add/post','Backend\PostController@create')->name('add.post');
    Route::post('/store/post','Backend\PostController@store')->name('store.post');
    Route::get('/all/post','Backend\PostController@index')->name('all.post');
    Route::get('/edit/post/{id}','Backend\PostController@edit')->name('edit.post');
    Route::post('/update/post/{id}','Backend\PostController@update')->name('update.post');
    Route::get('/soft/delete/post/{id}','Backend\PostController@softDelete')->name('soft.delete.post');
    Route::get('/post/recycle','Backend\PostController@recycleBin')->name('post.recycle');
    Route::get('/retrieve/post/{id}','Backend\PostController@retrieve')->name('retrieve.post');
    Route::get('/parmanent/delete/post/{id}','Backend\PostController@parmanentDelete')->name('parmanent.delete.post');


    //setting 

    //social
    Route::get('/social/link','Backend\SettingController@social')->name('social.link');
    Route::post('update/social/link/{id}','Backend\SettingController@updateSocialLink')->name('update.social.link');
    //seo
    Route::get('/seo','Backend\SettingController@seo')->name('seo');
    Route::post('update/seo/{id}','Backend\SettingController@updateSeo')->name('update.seo');
    //seo
    Route::get('/prayer','Backend\SettingController@prayer')->name('prayer');
    Route::post('update/prayer/{id}','Backend\SettingController@updatePrayer')->name('update.prayer');
    //live tv
    Route::get('/live/tv','Backend\SettingController@liveTV')->name('live.tv');
    Route::post('update/live/tv/{id}','Backend\SettingController@updateLivetv')->name('update.live.tv');
    Route::get('deactive/live/tv/{id}','Backend\SettingController@deactiveLivetv')->name('deactive.live.tv');
    Route::get('active/live/tv/{id}','Backend\SettingController@activeLivetv')->name('active.live.tv');
    //live tv
    Route::get('/notice','Backend\SettingController@notice')->name('notice');
    Route::post('update/notice/{id}','Backend\SettingController@updateNotice')->name('update.notice');
    Route::get('deactive/notice/{id}','Backend\SettingController@deactiveNotice')->name('deactive.notice');
    Route::get('active/notice/{id}','Backend\SettingController@activeNotice')->name('active.notice');

    //category start
    Route::get('/important/website','Backend\SettingController@importantWebsite')->name('website');
    Route::post('/store/website','Backend\SettingController@storeWebsite')->name('store.website');
    Route::get('/delete/website/{id}','Backend\SettingController@websiteDelete')->name('website.delete');
    Route::get('/edit/website/{id}','Backend\SettingController@editWebsite')->name('website.edit');
    Route::post('/update/website/{id}','Backend\SettingController@updateWebsite')->name('update.website');
    
    //photo gallery start
    Route::get('/photo/gallery','Backend\PhotoController@index')->name('photo.gallery');
    Route::post('/store/photo','Backend\PhotoController@store')->name('store.photo');
    Route::get('/delete/photo/gallery/{id}','Backend\PhotoController@delete')->name('photo.gallery.delete');
    Route::get('/edit/photo/gallery/{id}','Backend\PhotoController@edit')->name('photo.gallery.edit');
    Route::post('/update/photo/gallery/{id}','Backend\PhotoController@update')->name('update.photo');

    //video gallery start
    Route::get('/video/gallery','Backend\VideoController@index')->name('video.gallery');
    Route::post('/store/video','Backend\VideoController@store')->name('store.video');
    Route::get('/delete/video/gallery/{id}','Backend\VideoController@delete')->name('video.gallery.delete');
    Route::get('/edit/video/gallery/{id}','Backend\VideoController@edit')->name('video.gallery.edit');
    Route::post('/update/video/gallery/{id}','Backend\VideoController@update')->name('update.video');

});
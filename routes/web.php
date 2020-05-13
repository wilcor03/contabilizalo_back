<?php
Route::group(['middleware' => 'auth.basic'], function(){

	Route::group(['prefix' => 'admin'], function(){
		Route::get('administracion', ['as' => 'dashboard', 'uses' => 'UserController@dashboard']);
		
		Route::group(['namespace' => 'Blog'], function() {
			/*
			!-----------------------------------------------
			!	POST ADMIN
			!----------------------------------------------
			*/
			Route::get('posts', ['as' => 'post.view.all', 'uses' => 'PostController@viewAll']);
			Route::get('post/create', ['as' => 'post.create', 'uses' => 'PostController@create']);
			Route::post('post', ['as' => 'post.store', 'uses' => 'PostController@store']);
			Route::get('post/{post}/edit', ['as' => 'post.edit', 'uses' => 'PostController@edit']);
			Route::put('post/{post}', ['as' => 'post.update', 'uses' => 'PostController@update']);
			Route::get('post-search/{post?}', ['as' => 'post.search', 'uses' => 'PostController@search']);
			Route::post('add-recommended-post/{post}/{editingPost?}', ['as' => 'post.recommended', 'uses' => 'PostController@addRecommended']); //add or delete a recommend post
			Route::get('post-recommended-list/{editingPost?}', ['as' => 'post.recommended.lists', 'uses' => 'PostController@listRecommendedPosts']);//posts attached
			Route::get('post/cache/delete/{url?}', ['as' => 'post.cache.delete', 'uses' => 'PostController@deleteAllCache']);//posts attached
			
			/*
			!-----------------------------------------------
			!	CATEGORY ADMIN
			!----------------------------------------------
			*/
			Route::get('/{category}/c', ['as' => 'category.show', 'uses' => 'CategoryController@show']);

			/*
			!-----------------------------------------------
			!	VIDEO ADMIN
			!----------------------------------------------
			*/
			Route::post('video/{post?}', ['as' => 'video.store', 'uses' => 'VideoController@store']);
			Route::get('video-by-post/{post?}', ['as' => 'video.by.post', 'uses' => 'VideoController@byPost']);
			Route::delete('video/{video}', ['as' => 'video.destroy', 'uses' => 'VideoController@destroy']);
			Route::get('new-token', ['as' => 'new.token', 'uses' => 'VideoController@newToken']);

			/*
			!-----------------------------------------------
			!	FILES ADMIN
			!----------------------------------------------
			*/
			Route::post('file/{post?}', ['as' => 'file.store', 'uses' => 'FileController@store']);
			Route::get('files-by-post/{post?}', ['as' => 'file.by.post', 'uses' => 'FileController@byPost']);
			Route::delete('file/{file}', ['as' => 'file.destroy', 'uses' => 'FileController@destroy']);			

			/*
			!---------------------------------------------
			! IMAGES
			!----------------------------------------------
			*/
			Route::post('image/{editingPost?}', ['as' => 'image.store', 'uses' => 'ImageController@store']);
			Route::get('image-by-post/{editingPost?}', ['as' => 'image.by.post', 'uses' => 'ImageController@byPost']);
			Route::delete('image/{image}', ['as' => 'image.destroy', 'uses' => 'ImageController@destroy']);

			/*
			!------------------------------------------
			! VARIOUS
			!--------------------------------------------*/
			Route::get('get-url', 'PostController@getUrl');

		});
	});

});

/*----------------------------
! PUBLIC ROUTES
-----------------------------*/
/*Route::get('emails', function(){
	$suscriber = App\Suscriber::find(1);
	return (new App\Mail\DetripsRaffleEmail($suscriber))->render();
});*/

Route::get('redirecting-to-detrips', 'UserController@clickOnEmail')->name('redir.detrips');

Route::get('/', ['as' => 'home', 'uses' => 'UserController@home']);

Route::group(['namespace' => 'Blog'], function() {
	/*
	!	------------------------------------
	! POSTS
	!--------------------------------------
	*/
	Route::get('/{post}', ['as' => 'post.show', 'uses' => 'PostController@show']);
	/*
	!	------------------------------------
	! SITEMAP
	!--------------------------------------
	*/
	Route::get('sitemap/xml', ['as' => 'sitemap', 'uses' => 'SitemapController@sitemap']);
	/*
	!	------------------------------------
	! FILES
	!--------------------------------------
	*/
	Route::get('file-download/{file}', ['as' => 'file.download', 'uses' => 'FileController@download']);

	/*
	|--------------------------------------
	| PROMO - VENTAS
	|--------------------------------------
	*/

	Route::get('promo/descargar-aplicativo-renta-personas-naturales', ['as' => 'promo.apl.renta', 'uses' => 'PostController@promoPersNaturales']);

	Route::get('promo/descargar-aplicativo-renta-personas-juridicas', ['as' => 'promo.apl.renta.j', 'uses' => 'PostController@promoApl']);

	Route::get('promo/venta-de-cursos', ['as' => 'promo.courses', 'uses' => 'PostController@promoCourses']);
	
	/*
	|--------------------------------------
	| PAYU - PAGE STATES OF PAYMENTS
	|--------------------------------------
	*/

	Route::get('payu/pago-exitoso', ['as' => 'payu.success', 'uses' => 'PostController@payStates']);
	Route::get('payu/pago-no-exitoso', ['as' => 'payu.no.success', 'uses' => 'PostController@payStates']);
	Route::get('payu/pago-pendiente', ['as' => 'payu.pending', 'uses' => 'PostController@payStates']);
	
});

### APP DIAN
Route::get('apps/dian/rut-consult/{cc}', 'DianAppController@rutConsult');
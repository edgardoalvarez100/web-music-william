<?php

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
Route::post('mail/send_contact', 'SendMailController@send_contact');
Route::post('mail/send_visit', 'SendMailController@send_visit');
Route::post('mail/send_invite_friend', 'SendMailController@send_invite_friend');


Route::get('/', function () {
	return view('website.index');
});

// Auth::routes();

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@authenticate');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');




/*
|--------------------------------------------------------------------------
| Third Party | files: public/third_party/prayer/...
|--------------------------------------------------------------------------
|
*/
// PRAYER
Route::get('prayer', 'FrontController@prayer');
Route::get('save_prayer', 'PrayerController@store');





Route::prefix('livepanel')->group(function () {
     // // === PRAYER === //
    Route::get('prayer', 'PrayerController@index');
    Route::post('prayer/edit/{id}', 'PrayerController@update'); // Publish, Edit text or "Delete"

    Route::get('prayer/publish', 'PrayerController@publish');
    Route::get('prayer/delete', 'PrayerController@delete');
    Route::get('prayer/update', 'PrayerController@update');
    //Route::get('prayer-detail', 'PrayerDetailController@store');
     // // === END PRAYER === //

    // // === COUNTDOWN === //
    Route::resource('countdown', 'CounterdownController');
    // // === END COUNTDOWN === //

    // // === REDIRECTS === //
    Route::resource('/redirect','RedirectController');
    // // === END REDIRECTS === //

	Route::resource('/job', 'JobController');
	Route::get('/job/{job_id}/submit', 'JobSubmitController@index')->name('jobsubmit.index');
	Route::delete('/job/{job_id}/deletesubmit', 'JobSubmitController@destroy')->name('jobsubmit.destroy');

	Route::get('/home', 'HomeController@index')->name('home');

	Route::post('/post/{post}/photo','PhotoController@store')->name('photo.store');
	Route::delete('/post/photo/{photo}','PhotoController@destroy')->name('photo.destroy');

	Route::resource('/post','PostController');
	Route::get('/comment/{status}','CommentController@show')->name('comment.status');
	Route::post('/comment/{comment}/changestatus/','CommentController@changestatus')->name('comment.changestatus');
	Route::resource('/comment','CommentController');
	Route::get('/story/pdf', 'StoryController@pdf')->name('story.pdf');
	Route::resource('/story','StoryController');


	// User route
	Route::get('/user', 'UserController@index')->name('user');
	Route::get('/user/create', 'UserController@create')->name('user.create');
	Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
	Route::post('/user/{id}', 'UserController@update')->name('user.update');
	Route::get('/user/{id}', 'UserController@show')->name('user.show');
	Route::post('/user', 'UserController@store')->name('user.store');
	Route::delete('/user/{id}', 'UserController@destroy')->name('user.delete');


	//Profile route
	Route::get('/profile', 'ProfileController@show')->name('admin.profile');
	Route::post('/profile/changepassword', 'ProfileController@resetPassword')->name('profile.changepassword');

	//Ministries route
	Route::get('/ministry', 'MinistryController@index')->name('ministry');
	Route::get('/ministry/create', 'MinistryController@create')->name('ministry.create');
	Route::get('/ministry/edit/{id}', 'MinistryController@edit')->name('ministry.edit');
	Route::post('/ministry/{id}', 'MinistryController@update')->name('ministry.update');
	Route::get('/ministry/{id}', 'MinistryController@show')->name('ministry.show');
	Route::post('/ministry', 'MinistryController@store')->name('ministry.store');
	Route::delete('/ministry/edit/{id}', 'MinistryController@destroy')->name('ministry.delete');

	//Campus route
	Route::get('/campus', 'CampusController@index')->name('campus');
	Route::get('/campus/create', 'CampusController@create')->name('campus.create');
	Route::get('/campus/edit/{id}', 'CampusController@edit')->name('campus.edit');
	Route::post('/campus/{id}', 'CampusController@update')->name('campus.update');
	Route::get('/campus/{id}', 'CampusController@show')->name('campus.show');
	Route::post('/campus', 'CampusController@store')->name('campus.store');
	Route::delete('/campus/edit/{id}', 'CampusController@destroy')->name('campus.delete');

	//serie route
	Route::prefix('serie')->group(function(){

		Route::get('/serie', 'SerieController@index')->name('serie');
		Route::get('/serie/create', 'SerieController@create')->name('serie.create');
		Route::get('/serie/edit/{id}', 'SerieController@edit')->name('serie.edit');
		Route::post('/serie/{id}', 'SerieController@update')->name('serie.update');
		Route::get('/serie/{id}', 'SerieController@show')->name('serie.show');
		Route::post('/serie', 'SerieController@store')->name('serie.store');
		Route::post('/serie/{id}/addpromo', 'SerieController@addpromo')->name('serie.addpromo');
		Route::post('/serie/{id}/deletepromo', 'SerieController@deletepromo')->name('serie.deletepromo');
		Route::delete('/serie/edit/{id}', 'SerieController@destroy')->name('serie.delete');

		Route::get('/{id}/video', 'VideoController@index')->name('video');
		Route::get('/{id}/video/create', 'VideoController@create')->name('video.create');
		Route::get('/{serie_id}/video/edit/{id}', 'VideoController@edit')->name('video.edit');
		Route::post('/{serie_id}/video/{id}', 'VideoController@update')->name('video.update');
		Route::get('/video/{id}', 'VideoController@show')->name('video.show');
		Route::post('/{id}/video', 'VideoController@store')->name('video.store');
		Route::delete('{serie_id}/video/edit/{id}', 'VideoController@destroy')->name('video.delete');

		Route::get('/{id}/promopack', 'PromopackController@index')->name('promopack');
		Route::get('/promopack/create', 'PromopackController@create')->name('promopack.create');
		Route::get('/promopack/edit/{id}', 'PromopackController@edit')->name('promopack.edit');
		Route::post('/promopack/{id}', 'PromopackController@update')->name('promopack.update');
		Route::get('/promopack/{id}', 'PromopackController@show')->name('promopack.show');
		Route::post('/promopack', 'PromopackController@store')->name('promopack.store');
		Route::delete('/promopack/edit/{id}', 'PromopackController@destroy')->name('promopack.delete');


		Route::get('/speaker', 'SpeakerController@index')->name('speaker');
		Route::get('/speaker/create', 'SpeakerController@create')->name('speaker.create');
		Route::post('/speaker/addform', 'SpeakerController@addform')->name('speaker.addform');
		Route::get('/speaker/edit/{id}', 'SpeakerController@edit')->name('speaker.edit');
		Route::post('/speaker/{id}', 'SpeakerController@update')->name('speaker.update');
		Route::get('/speaker/{id}', 'SpeakerController@show')->name('speaker.show');
		Route::post('/speaker', 'SpeakerController@store')->name('speaker.store');
		Route::delete('/speaker/edit/{id}', 'SpeakerController@destroy')->name('speaker.delete');

		Route::get('/speaker/{id}/videos', 'SpeakerController@videos')->name('speaker.videos');


	});

	Route::prefix('event')->group(function(){
		//Location route
		Route::get('/location', 'LocationController@index')->name('location');
		Route::get('/location/create', 'LocationController@create')->name('location.create');
		Route::get('/location/edit/{id}', 'LocationController@edit')->name('location.edit');
		Route::post('/location/{id}', 'LocationController@update')->name('location.update');
		Route::get('/location/{id}', 'LocationController@show')->name('location.show');
		Route::post('/location', 'LocationController@store')->name('location.store');
		Route::delete('/location/edit/{id}', 'LocationController@destroy')->name('location.delete');

	//Events route
		Route::get('/event', 'EventController@index')->name('event');
		Route::get('/event/create', 'EventController@create')->name('event.create');
		Route::get('/event/edit/{id}', 'EventController@edit')->name('event.edit');
		Route::post('/event/{id}', 'EventController@update')->name('event.update');
		Route::get('/event/{id}', 'EventController@show')->name('event.show');
		Route::post('/event', 'EventController@store')->name('event.store');
		Route::delete('/event/edit/{id}', 'EventController@destroy')->name('event.delete');
	});

	Route::prefix('button')->group(function(){
		Route::post('/add', 'ButtonController@store')->name('button.store');
		Route::post('/update', 'ButtonController@update')->name('button.update');
		Route::post('/delete', 'ButtonController@destroy')->name('button.destroy');
	});

});

// Password Reset Routes...
if (config('app.reset'))
{
	Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
	Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
	Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
}

// Email Verification Routes...
if (config('app.verify'))
{
	Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
	Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
	Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
}

#No agregar nada debajo de esta linea
// Route::any('/{any?}', 'RedirectController@check')->where('any', '.*');

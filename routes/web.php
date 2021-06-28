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

Route::get('/', 'WelcomeController@index');


Route::get('/services','ServicesController@indexServices');


Route::get('/blog', 'PostsController@indexFrontend');

Route::get('/{post}/blog-post', 'PostsController@show');

Route::post('/{post}/blog-post', 'CommentsController@store');



Route::get('/contact', function () {
    return view('contact');
});

Route::get('/elements', function () {
    return view('elements');
});

Route::group(['middleware' => 'auth'], function (){
    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');

    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');

    Route::get('/admin/articles', function () {
        return view('articles');
    });
    

    Route::get('/admin/members', 'MembersController@index')->middleware('can:verifyRole, App\User');

    Route::post('/admin/members', 'MembersController@store')->middleware('can:verifyRole, App\User');

    Route::get('/admin/members/{user}/editmember', 'MembersController@show')->middleware('can:verifyRole, App\User');
    Route::patch('/admin/members/{user}/editmember', 'MembersController@update')->middleware('can:verifyRole, App\User');
    Route::delete('/admin/members/{user}/editmember', 'MembersController@destroy')->middleware('can:verifyRole, App\User');

    Route::get('/admin/team', 'teamMemberController@index');
    Route::post('/admin/team', 'teamMemberController@store');

    Route::patch('/admin/{teamMember}', 'TeamMemberController@update');

    Route::get('/admin/team/{teamMember}/editteammember', 'TeamMemberController@show');
    Route::patch('/admin/team/{teamMember}/editteammember', 'TeamMemberController@updateTeamMember');
    Route::delete('/admin/team/{teamMember}/editteammember', 'TeamMemberController@destroy');

    Route::get('/admin/testimonials', 'TestimonialsController@index');
    Route::post('/admin/testimonials', 'TestimonialsController@store');

    Route::get('/admin/testimonials/{testimonials}/edittestimonial', 'TestimonialsController@show');
    Route::patch('/admin/testimonials/{testimonials}/edittestimonial', 'TestimonialsController@update');
    Route::delete('/admin/testimonials/{testimonials}/edittestimonial', 'TestimonialsController@destroy');

    Route::get('/admin/mails', 'MailsController@index');
    Route::get('/admin/mails/{mail}/showmail', 'MailsController@show');

    Route::get('/admin/projects', 'ProjectsController@index');
    Route::post('/admin/projects', 'ProjectsController@store');

    Route::get('/admin/newsletter', 'NewsletterController@index');
    Route::post('/admin/newsletter','NewsletterController@sendMail');

    Route::get('/admin/services', 'ServicesController@index');
    Route::post('/admin/services', 'ServicesController@store');

    Route::get('/admin/services/{service}/editservice', 'ServicesController@show');
    Route::patch('/admin/services/{service}/editservice', 'ServicesController@update');
    Route::delete('/admin/services/{service}/editservice', 'ServicesController@destroy');

    Route::get('/admin/projects/{project}/editproject', 'ProjectsController@show');
    Route::patch('/admin/projects/{project}/editproject', 'ProjectsController@update');
    Route::delete('/admin/projects/{project}/editproject', 'ProjectsController@destroy');

    Route::get('/admin/articles', 'PostsController@index');
    Route::post('/admin/articles', 'PostsController@store');

});

// Auth::routes();


Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/mail','MailsController@sendMail');
Route::post('/newsletter','NewsletterController@store');

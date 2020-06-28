<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PagesController@welcome');

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

Route::get('/home', 'HomeController@index')->name('home');



Auth::routes();




Route::resource('users', 'UserController');

Route::resource('kullancilar', 'kullancilarController');

Route::Get('profile', 'UserController@profile');

Route::Get('profileAdmin', 'UserController@profileAdmin');

Route::PUT('users.updateUser/{id}', 'UserController@updateUser')->name('users.updateUser');

Route::Get('Me', 'UserController@Me');

Route::Get('MeAdmin', 'UserController@MeAdmin');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('posts', 'PostController');

Route::resource('crud','CrudController');

Route::resource('image','ImageController');

Route::resource('staff','StaffController');

Route::resource('company','CompanyController');

Route::resource('firma','FirmaController');

Route::resource('food','FoodController');

Route::resource('relation','FoodRelationController');

Route::resource('group','FoodGroupController');

Route::resource('specific','FoodSpecificController');

Route::resource('unit','FoodUnitController');

Route::resource('karma','KarmaController');

Route::resource('type','AnimalTypeController');

Route::resource('motion','AnimalMotionController');

Route::resource('AnimalFoodType','AnimalFoodTypeController');

Route::resource('family','AnimalFamilyController');

Route::resource('animal','AnimalController');

Route::resource('solution','SolutionController');

Route::resource('Ai','AiController');

Route::get('/downloadPDF/{id}','SolutionController@downloadPDF');

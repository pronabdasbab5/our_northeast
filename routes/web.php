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

require_once 'website.php';

Auth::routes();

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');

Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::namespace('Auth')->group(function () {

    	Route::namespace('Depart')->group(function () {
    		Route::get('new_depart', 'DepartController@showDepartAddForm')->name('admin.new_depart_form');
    		// Route::post('add_depart', 'DepartController@addDepart')->name('admin.add_depart');
    		// Route::get('all_depart', 'DepartController@allDepart')->name('admin.all_depart');
    		// Route::get('edit_depart/{departId}', 'DepartController@showDepartEditForm')->name('admin.edit_depart');
      //       Route::post('update_depart/{departId}', 'DepartController@updateDepart')->name('admin.update_depart');
    	});

     //    Route::namespace('Professor')->group(function () {
     //        Route::get('new_professor', 'ProfessorController@showProfessorAddForm')->name('admin.new_professor_form');
     //        Route::put('add_professor', 'ProfessorController@addProfessor')->name('admin.add_professor');
     //        Route::get('professor_pic/{filename}', 'ProfessorController@professorPic')->name('professor_pic');
     //        Route::get('all_professor', 'ProfessorController@allProfessor')->name('admin.all_professor');
     //        Route::get('edit_professor/{professorId}', 'ProfessorController@showProfessorEditForm')->name('admin.edit_professor');
     //        Route::put('update_professor/{professorId}', 'ProfessorController@updateProfessor')->name('admin.update_professor');
     //        Route::get('change_professor_status/{professorId}/{status}', 'ProfessorController@changeStatus')->name('admin.change_professor_status');
     //        Route::get('delete_professor/{professorId}', 'ProfessorController@deleteProfessor')->name('admin.delete_professor');
     //    });
    });
});

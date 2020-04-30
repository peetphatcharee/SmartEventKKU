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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/MediaList', 'MediaController@getMedia');//หน้าแสดงการจัดการกิจกรรม

Route::get('addMedia','MediaController@getForm'); //หน้าเพิ่มกิจกรรม
Route::post('submit_form','MediaController@postForm');

Route::get('/show_smart', 'MediaController@getSmart');//หน้าแสดงรายการกิจกรรมของ นศ

Route::get('/detail_smart{id}', 'MediaController@getSmart2');//หน้าแสดงรายการกิจกรรม 2 เพิ่มเติม  นศ

Route::get('/add_point{id}', 'MediaController@addPoint');//หน้าแสดงรายการกิจกรรม 2 เพิ่มเติม

Route::get('/update_point{id}', 'MediaController@updatePoint');


Route::get('edit_media{id}','MediaController@getEdit');//แก้ไขกิจกรรม
Route::post('update','MediaController@updateForm');//ทำการอัพเดตกิจกรรม

Route::get('del{id}','MediaController@del');//ลบคอร์ส
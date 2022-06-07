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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::get('calendar-event', 'CalenderController@index');
Route::post('calendar-crud-ajax', 'CalenderController@calendarEvents');
//Роут справочника направлоений
Route::resource('categories', 'CategoryController');


Route::name('start')->get('/', 'StartController@start');

//Route::name('login')->get('/', 'Auth\LoginController@showLoginForm');
// Route::name('login')->post('/login', 'Auth\LoginController@login');
// Route::name('logout')->post('logout', 'Auth\LoginController@logout')->name('logout');


Route::name('medical')->get('/medical', 'StartController@medical');

//Группа роутов справочников
Route::prefix('')->namespace('Back\Spr')->group(function () {

//Роут справочника направлоений
Route::resource('/p_payout', 'PayoutController');

//Роут пользователей
Route::resource('/p_dolgn', 'PdolgnController');

//Роут пользователей
Route::resource('/profile', 'ProfileController');


//Роут справочник оперблока
Route::resource('/p_operblock', 'PoperblockController');

//Роут справочника палат
Route::resource('/palat', 'PalatController');

//Роут справочника операций
Route::resource('/p_oper', 'PoperController');

//Роут справочника операций узкого
Route::resource('/sodiag', 'SodiagController');

//Роут справочника ризков
Route::resource('/sprrizki', 'SprrizkiController')->only([
    'index','create','store', 'edit', 'update', 'destroy' ]);

//Роут справочника уникального оборудования
Route::resource('/sprdevice', 'SprdeviceController');

//Роут справочника мкб
Route::resource('/mkb', 'SprmkbController');

});

//Группа роутов
Route::prefix('')->namespace('Back')->group(function () {

//Фильтр вывода отчеттов
Route::name('filter')->get('/filter/{id?}', 'MedicalController@filter');

//Страница для поиска нового пользователя в базе доктор єлекс
Route::name('searchuser')->get('/searchuser', 'MedicalController@searchuser');

//Страница поиска пациента в базе доктор єлекс
Route::name('searchuser')->post('/searchuser', 'MedicalController@searchuserdate');

//Роут заполнения направления на операций
Route::name('refsurgery')->get('/refsurgery/{id?}', 'MedicalController@refsurgery');

//Роут записи направления на операций
Route::name('refsurgery')->post('/refsurgery/{id?}', 'MedicalController@refsurgerypost');

//Вывод графика
Route::name('grpacient')->get('/grpacient/{id?}', 'MedicalController@grpacient');

//Работа с карточкой уже ранее введенного направления
Route::name('addsurgery')->get('/addsurgery/{id?}', 'MedicalController@addsurgery');

//Работа с карточкой уже ранее введенного направления
Route::name('soposnibrizki')->get('/soposnibrizki/{id}', 'MedicalController@sogetnibrizki');

//Запись ризков пациента в таблицу
Route::name('postnibrizki')->post('/postnibrizki', 'MedicalController@postnibrizki');
});



//открытие страницы для вывода формы нового пользователя
Route::name('usersearchs')->get('/usersearchs', 'StartController@usersearchs');


//Корректировка пользователя пока не используем
Route::name('userprofileedit')->get('/userprofileedit/{nibcard?}', 'StartController@userprofileedit');










//Вызов диагноза по аджакс

Route::name('test')->get('test', 'TestController@index');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

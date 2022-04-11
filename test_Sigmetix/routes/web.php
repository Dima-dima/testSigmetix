<?php

use App\Classies\WorkWithDb;
use App\Classies\WorkWithSql;
use App\Http\Controllers\TestController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Classies;

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
})->name('welcome');

Route::get('/show', function (Request $request) {

    $dataSource = $request->query('alternative_storage') && is_numeric($request->query('alternative_storage')) ? new Classies\WorkWithSqlite('sqlite') : new WorkWithSql('mysql');

    $controller =new TestController();
    $controller->setWorkWithDataInterface($dataSource);
    return $controller->index();

})->name('showData');

Route::get('/add', [TestController::class,'addForm'])->name('addData');
Route::post('/add', function (Request $request){
    $controller = getTestController();
    return $controller->addData($request);
})->name('addDataProcess');

Route::delete('/deleteUser/{id}',function ($id){
    $controller = getTestController();
    return $controller->deleteUser($id);
})->name('deleteUser');

Route::get('/editUser/{id}',[TestController::class,"editForm"])->name('editForm');
Route::put('/editUser',function (Request $request){
    $controller = getTestController();
    return $controller->updateModel($request);
})->name('editUser');



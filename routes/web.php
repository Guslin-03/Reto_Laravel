<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\StatusController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resources([
    'departments' => DepartmentController::class,
    'users'=> UserController::class,
    'categories'=> CategoryController::class,
    'issues'=> IssueController::class,
    'categories'=> CategoryController::class,
    'priorities'=> PriorityController::class,
    'statuses'=> StatusController::class,
]);

Route::middleware(['auth'])->group(function () {
    Route::resources([
        'departments' => DepartmentController::class,
    ]);
});

Route::controller(DepartmentController::class)->group(function () {
    Route::get('/departments', 'index')->name('departments.index');
    Route::get('/departments/{department}', 'show')->name('departments.show');
})->withoutMiddleware([Auth::class]);    

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
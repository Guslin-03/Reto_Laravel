<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\ChangePasswordController;

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
    'comments'=> CommentController::class,
]);

//DEPARTMENT
Route::middleware(['auth'])->group(function () {
    Route::resources([
        'departments' => DepartmentController::class,
    ]);
});
Route::controller(DepartmentController::class)->group(function () {
    Route::get('/departments', 'index')->name('departments.index');
    Route::get('/departments/{department}', 'show')->name('departments.show');
})->withoutMiddleware([Auth::class]);

//ISSUE
Route::middleware(['auth'])->group(function () {
    Route::resources([
        'issues' => IssueController::class,
    ]);
});
Route::controller(IssueController::class)->group(function () {
    Route::get('/issues', 'index')->name('issues.index');
    Route::get('/issues/{issue}', 'show')->name('issues.show');
})->withoutMiddleware([Auth::class]);


//COMMENT
Route::middleware(['auth'])->group(function () {
    Route::resources([
        'comments' => CommentController::class,
    ]);
});

//PRIORITY
Route::middleware(['auth'])->group(function () {
    Route::resources([
        'priorities' => PriorityController::class,
    ]);
});
Route::controller(PriorityController::class)->group(function () {
    Route::get('/priorities', 'index')->name('priorities.index');
})->withoutMiddleware([Auth::class]);

//STATUS
Route::middleware(['auth'])->group(function () {
    Route::resources([
        'statuses' => StatusController::class,
    ]);
});
Route::controller(StatusController::class)->group(function () {
    Route::get('/statuses', 'index')->name('statuses.index');
})->withoutMiddleware([Auth::class]);

//CATEGORY
Route::middleware(['auth'])->group(function () {
    Route::resources([
        'categories' => CategoryController::class,
    ]);
});
Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index')->name('categories.index');
})->withoutMiddleware([Auth::class]);

//USER
Route::middleware(['auth'])->group(function () {
    Route::resources([
        'users' => UserController::class,
    ]);
});
Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index')->name('users.index');
    Route::get('/users/{user}', 'show')->name('users.show');
})->withoutMiddleware([Auth::class]);

Auth::routes();

Route::get('/change-password', [ChangePasswordController::class, 'edit'])->name('password.edit');
Route::put('/change-password', [ChangePasswordController::class, 'update'])->name('password.update');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

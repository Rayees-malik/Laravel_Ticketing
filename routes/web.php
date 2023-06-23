<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CommentController;

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
    return redirect('/tickets');
});




Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login',[UserController::class, 'authenticateUser']);

Route::middleware('auth')->group(function(){

Route::get('/tickets/create', [TicketController::class, 'createTicket']);
Route::post('/tickets/create', [TicketController::class, 'storeTicket']);
Route::get('/tickets', [TicketController::class, 'viewTickets']);
Route::get('/ticket/{id}', [TicketController::class, 'showTicket']);
Route::get('/logout',[UserController::class, 'logoutUser']);

});

Route::get('/admin/home', function () {
    return 'Home';
})->middleware('can:access_admin_panel');


Route::middleware('can:manage_users')->group(function(){
    Route::get('/users', [AdminController::class, 'viewUsers']);

    Route::get('/user/{id}/edit', [AdminController::class, 'editUser']);
    
    Route::put('/user/{id}/edit', [AdminController::class, 'updateUser']);
    
    Route::delete('/user/{id}', [AdminController::class, 'deleteUser']);
    
    Route::get('/users/create', [AdminController::class, 'createUser']);
    
    Route::post('/users/create', [AdminController::class, 'storeUser']);
});





Route::middleware('can:modify_tickets')->group(function(){

Route::get('/ticket/{id}/edit', [TicketController::class, 'editTicket']);

Route::put('/ticket/{id}/edit', [TicketController::class, 'updateTicket']);

Route::delete('/ticket/{id}', [TicketController::class, 'deleteTicket']);

Route::post('/comment/{ticket_id}', [CommentController::class, 'storeComment']);

});



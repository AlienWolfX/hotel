<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideoUserController;

Route::get('/', [HomeController::class, 'home']);

require __DIR__.'/auth.php';

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'index']);
    Route::get('/create_room', [HomeController::class, 'create_room']);
    Route::post('/add_room', [HomeController::class, 'add_room']);
    Route::get('/view_room', [HomeController::class, 'view_room']);
    Route::get('/room_delete/{id}', [HomeController::class, 'room_delete']);
    Route::get('/room_update/{id}', [HomeController::class, 'room_update']);
    Route::post('/edit_room/{id}', [HomeController::class, 'edit_room']);
    Route::get('/bookings', [AdminController::class, 'bookings']);
    Route::get('/delete_booking/{id}', [AdminController::class, 'delete_booking']);
    Route::get('/approve_book/{id}', [AdminController::class, 'approve_book']);
    Route::get('/reject_book/{id}', [AdminController::class, 'reject_book']);
    Route::get('/view_gallery', [AdminController::class, 'view_gallery']);
    Route::post('/upload_gallery', [AdminController::class, 'upload_gallery']);
    Route::get('/delete_gallery/{id}', [AdminController::class, 'delete_gallery']);
    Route::get('/all_messages', [AdminController::class, 'all_messages']);
    Route::get('/send_mail/{id}', [AdminController::class, 'send_mail']);
    Route::post('/mail/{id}', [AdminController::class, 'mail']);
    Route::get('/admin_home', [AdminController::class, 'admin_home']);

    // Managing users
    Route::get('/manage_users', [AdminController::class, 'manageUserIndex'])->name('manage_users.index');
    Route::delete('/manage_users/{id}', [AdminController::class, 'manageUserDelete'])->name('manage_users.destroy');
    Route::get('/manage_users/{id}', [AdminController::class, 'manageUserEdit'])->name('manage_users.edit');
    Route::put('/manage_users/{id}', [AdminController::class, 'manageUserUpdate'])->name('manage_users.update');

    // Virtual Tour CRUD for admin
    Route::get('/virtual_tour/update/{id}', [VideoController::class, 'updateVideo'])->name('virtual_tour.update');
    Route::post('/virtual_tour/edit/{id}', [VideoController::class, 'edit'])->name('virtual_tour.edit');
    Route::get('/virtual_tour', [VideoController::class, 'index'])->name('virtual_tour.index');
    Route::post('/virtual_tour/store', [VideoController::class, 'store'])->name('virtual_tour.store');
    Route::delete('/virtual_tour/{video}', [VideoController::class, 'destroy'])->name('virtual_tour.destroy');
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/my_bookings', [HomeController::class, 'my_bookings'])->name('home.bookings');
});

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/add_booking/{id}', [HomeController::class, 'add_booking']);
    Route::get('/dashboard', [HomeController::class, 'login_home'])->name('dashboard');
    Route::get('/pay/{id}', [PaymentController::class, 'pay']);
});

// Public Virtual Tour routes
Route::get('/tour/{id}', [VideoUserController::class, 'viewTour'])->name('virtual_tour.viewTour');


// Public routes
Route::get('/room_details/{id}', [HomeController::class, 'room_details']);
Route::post('/contacts', [HomeController::class, 'contacts']);
Route::get('/our_rooms', [HomeController::class, 'our_rooms']);
Route::get('/hotel_gallery', [HomeController::class, 'hotel_gallery']);
Route::get('/contact_us', [HomeController::class, 'contact_us']);
Route::get('/about_us', [HomeController::class, 'about_us']);
Route::get('/homes', [HomeController::class, 'homes']);
Route::get('/services', [HomeController::class, 'services']);

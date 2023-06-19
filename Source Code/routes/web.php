<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TestimonyController;


Route::get('/', [BookingController::class, 'showNotifPelanggan'])->name('show.dashboard.pelanggan');

Route::get('/userlogin', [LoginController::class, 'index'])->name('userlogin');
Route::post('/customLogin', [LoginController::class, 'login'])->name('customLogin');
Route::get('/show-register', [RegisterController::class, 'showRegistrationForm'])->name('user.register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/logout', [LoginController::class, 'logout'])->name('userlogout');

//guess
Route::get('/categories/pelanggan', [RoomController::class, 'indexCategoryPelanggan'])->name('category.room');
Route::get('/testimonies/show-all', [TestimonyController::class, 'showAll'])->name('testimonies.showAll');
Route::get('/rooms/category/{category}', [RoomController::class, 'showList'])->name('rooms.category');
Route::get('/', [BookingController::class, 'showNotifPelanggan'])->name('show.dashboard.pelanggan');

Route::group(['middleware' => ['auth', 'pelanggan']], function () {
    Route::resource('booking', BookingController::class);
    Route::get('/booking', [BookingController::class, 'index'])->name('user.booking.index');
    Route::delete('/user/orders/{orderId}/cancel', [BookingController::class, 'cancelBooking'])->name('user.booking.cancel');
    Route::get('/user/orders', [BookingController::class, 'index'])->name('user.orders.index');
    Route::group(['prefix' => 'booking'], function () {
        Route::delete('{booking}/cancel', [BookingController::class, 'cancelBooking'])->name('booking.cancel');
    });
    Route::get('orders/{orderId}/payment', [BookingController::class, 'paymentForm'])->name('user.orders.payment');
    Route::post('/submit-payment/{orderId}', [BookingController::class, 'submitPayment'])->name('submit.payment');
    Route::get('/notifications/mark-as-read/{id}', [BookingController::class, 'markAsReadPelanggan'])->name('user.notifications.markAsRead');
    Route::get('/testimonies/create', [TestimonyController::class, 'create'])->name('testimonies.create');
    Route::post('/testimonies', [TestimonyController::class, 'store'])->name('testimonies.store');
    Route::get('/testimonies/{testimony}/edit', [TestimonyController::class, 'edit'])->name('testimonies.edit');
    Route::put('/testimonies/{testimony}', [TestimonyController::class, 'update'])->name('testimonies.update');
    Route::delete('/testimonies/{testimony}', [TestimonyController::class, 'destroy'])->name('testimonies.destroy');
    Route::get('/roomIndex', [RoomController::class, 'index'])->name('user.room.index');
});


Route::group(['middleware' => 'admin'], function () {
    Route::post('/admin/orders/{orderId}/accessible', [BookingController::class, 'accessible'])->name('admin.orders.accessible');
    Route::post('/admin/orders/{orderId}/approve', [BookingController::class, 'approve'])->name('admin.orders.approve');
    Route::post('/admin/orders/{orderId}/reject', [BookingController::class, 'reject'])->name('admin.orders.reject');
    Route::delete('/admin/orders/{orderId}/delete', [BookingController::class, 'delete'])->name('admin.orders.delete');
    Route::get('/admin-home', [BookingController::class, 'showNotifications'])->name('admin.notifications.index');
    Route::get('/admin/orders', [BookingController::class, 'listOrder'])->name('admin.orders.list');
    Route::post('/admin/mark-notification-as-read/{notificationId}', [BookingController::class, 'markNotificationAsRead'])->name('admin.markNotificationAsRead');
    Route::get('/admin/rooms', [RoomController::class, 'index'])->name('admin.rooms.index');
    Route::get('/admin/rooms/create', [RoomController::class, 'create'])->name('admin.rooms.create');
    Route::post('/admin/rooms', [RoomController::class, 'store'])->name('admin.rooms.store');
    Route::get('/admin/rooms/{room}/edit', [RoomController::class, 'edit'])->name('admin.rooms.edit');
    Route::put('/admin/rooms/{room}', [RoomController::class, 'update'])->name('admin.rooms.update');
    Route::delete('/admin/rooms/{room}', [RoomController::class, 'destroy'])->name('admin.rooms.destroy');
    Route::get('/admin/testimonies', [TestimonyController::class, 'index'])->name('admin.testimonies.index');
    Route::delete('/admin/testimonies/{testimony}', [TestimonyController::class, 'adminDestroy'])->name('admin.testimonies.destroy');
    Route::get('/categories/admin', [RoomController::class, 'indexCategory'])->name('admin.category.index');
    Route::get('/categories/create', [RoomController::class, 'createCategory'])->name('category.create');
    Route::post('/categories', [RoomController::class, 'storeCategory'])->name('category.store');
    Route::get('/categories/{category}/edit', [RoomController::class, 'editCategory'])->name('category.edit');
    Route::put('/categories/{category}', [RoomController::class, 'updateCategory'])->name('category.update');
    Route::delete('/categories/{category}', [RoomController::class, 'destroyCategory'])->name('category.destroy');
});



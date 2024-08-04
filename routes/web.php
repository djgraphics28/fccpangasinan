<?php

use App\Livewire\Home;
use App\Livewire\Login;
use App\Livewire\Post\Show as PostShow;
use App\Livewire\PreRegistration;
use App\Livewire\Register;
use Illuminate\Support\Facades\Route;

Route::get('/register', Register::class)->name('register')->middleware('guest');
Route::get('/login', Login::class)->name('login')->middleware('guest');
Route::get('/logout', Login::class)->name('logout')->middleware('auth');

// Route::get('/logout', function () {

//     return redirect()->route('login');
// })->name('logout');

Route::get('/', Home::class)->name('home');
Route::get('/pre-registration', PreRegistration::class)->name('pre-registration')->middleware('auth');

Route::get('/article/{post:slug}', PostShow::class)->name('post.show');

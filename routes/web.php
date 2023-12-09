<?php

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/' , [
    HomeController::class ,
    'index' ,
])
     ->name('home');
Route::get('/newsletter' , [
    HomeController::class ,
    'newsletterForm' ,
]);
Route::post('/newsletter' , [
    HomeController::class ,
    'newsletter' ,
])->name('newsletter');
Route::get('/register' , [
    HomeController::class ,
    'registerForm' ,
])
     ->name('register-form');
Route::post('/register' , [
    HomeController::class ,
    'register' ,
])
     ->name('register');
Route::get('/update-form/{id}' , [
    HomeController::class ,
    'updateForm' ,
])
     ->name('update-form');
Route::post('/update/{id}' , [
    HomeController::class ,
    'update' ,
])
     ->name('update');
Route::get('/review-edit-request/{token}' , [
    HomeController::class ,
    'reviewEditRequest' ,
])
     ->name('review-edit-request');
Route::get('/review-register-request/{token}' , [
    HomeController::class ,
    'reviewRegisterRequest' ,
])
     ->name('review-register-request');
Route::post('/accept-edit-request/{token}' , [
    HomeController::class ,
    'acceptEditRequest' ,
])
     ->name('accept-edit-request');
Route::post('/reject-edit-request/{token}' , [
    HomeController::class ,
    'rejectEditRequest' ,
]);
Route::post('/accept-register-request/{token}' , [
    HomeController::class ,
    'acceptRegisterRequest' ,
])
     ->name('accept-register-request');
Route::post('/reject-register-request/{token}' , [
    HomeController::class ,
    'rejectRegisterRequest' ,
]);

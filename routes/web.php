<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{name?}', function ($name=null) {
    if ($name) {
        echo 'Hello ' . $name . '!';
    } else {
        echo 'Hello World!';
    }
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', function (Illuminate\Http\Request $request) {
    $username = $request->username;
    $password = $request->password;

    if ($username == 'admin' && $password == 'admin') {
        return view('welcome');
    }
    return view('login_error');
});

Route::get('/product', function(){
    return view('product');
});

Route::post('/product', function (Illuminate\Http\Request $request) {
    $description = $request->productDescription;
    $discountPercent = $request->discountPercent;
    $price = $request->price;
    $discountAmount = $price*$discountPercent*0.1;
    if($description){
        return view('kq', compact(['description', 'discountPercent', 'price', 'discountAmount']));
    }
});
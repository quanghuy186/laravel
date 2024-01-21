<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Carbon\Carbon;


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

Route::post('/login', function (Request $request) {
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

Route::get('dictionary', function(){
    return view('dictionary');
});

Route::post('dictionary', function (Request $request) {
    $lists = ['hello' => 'xin chào', 'good bye' => 'tạm biệt', 'hihi' => 'biến'];
    $rs = $request->word;

    foreach ($lists as $key => $value) {
        if ($rs == $key) {
            return view('dictionary', compact('value'));
        }
    }
});

Route::group(['prefix' => 'user'], function(){
	Route::get('/profile', function(){
		return redirect('/user/login');
	});

	Route::get('/login', function(){
		return 'login web here';
	});
});

Route::get('/time', function(){
        return view('index');   
});

Route::get('/timezone', function(Request $request){
    if(isset($request->location)){
        $location = $request->location;
        $todayDate = Carbon::now($location)->format('Y-m-d h:i:s');
        echo 'Múi giờ bạn chọn ' . $location . ' hiện tại đang là: ' . $todayDate;
    }
});